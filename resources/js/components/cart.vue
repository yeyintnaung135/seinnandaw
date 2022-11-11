<template>
    <div class="p-1 p-md-4">
        <h2 class="text-uppercase mb-3 text-left">CART</h2>
        <div class="sn-cart-table table-responsive">
            <table class="table border">
                <thead class="bg-white">
                <tr scope="row">
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="data in this.cdata">
                    <td scope="row" class="text-center">
                  <span @click="remove(data.id)">
                    <svg class="ast-mobile-svg ast-close-svg" fill="currentColor" width="18" height="18"
                         viewBox="0 0 24 24">
                      <path
                          d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
                    </svg>
                  </span>
                    </td>
                    <td>
                        <img :src="host+'/'+data.photo" class="sn-cart-image"/>
                    </td>
                    <td>{{ data.name }}</td>
                    <td>{{ data.price }}</td>

                    <td>
                        <div class="sn-pd-input d-flex">
                            <input type="number" name="" @change="changecount(data.id)"
                                   v-model="actioncount[data.id]=data.count" min="1" max="20">
                        </div>
                    </td>
                    <td>{{ data.price * data.count }}</td>
                    <td>
                        <button class="mr-0 mr-md-5 p-2" @click="submitform('form'+data.id)">Check Out</button>
                        <form :action="host+'/checkoutform'" :ref="'form'+data.id" method="post">

                            <input type="hidden" name="productid" :value="data.id">
                            <input type="hidden" name="count" :value="data.count">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="guestid" :value="guestid">


                        </form>
                    </td>
                </tr>
                <!--                <tr>-->
                <!--                    <td colspan="6" class="text-right">-->
                <!--                        <button class="mr-0 mr-md-5 p-2">UPDATE CART</button>-->
                <!--                    </td>-->
                <!--                </tr>-->
                </tbody>
            </table>
        </div>

    </div>

</template>

<script>
export default {
    name: "cart",
    props: ['cartdata', 'guestid'],
    data: function () {
        return {
            csrf: '',
            host: '',
            cdata: '',
            actioncount: []

        }
    },
    created() {
        this.host = this.$hostname;


    },
    mounted() {
        this.csrf = window.csrf;

        // cartdata will be 0 if user is not loginned retrun from server
        if (this.cartdata !== 0) {
            this.cdata = this.cartdata;

        } else {
            const temp = JSON.parse(localStorage.getItem('addtocartlist'));
            this.cdata = temp;
            console.log(temp)

        }
        console.log(this.guestid)

    },
    methods: {
        submitform(id) {
            console.log(this.$refs[id])
            this.$refs[id][0].submit();

        },
        async changecount(id) {
            if (this.cartdata !== 0) {
                const changesuccess = await this.changecountonserver(id, this.actioncount[id]);
                if (changesuccess.data.message == 'fail') {
                    window.location.reload();

                } else {
                    let tempcount = changesuccess.data.message;
                    localStorage.setItem('addtocartcount', JSON.stringify(tempcount));
                    this.$parent.addtocartcount = JSON.parse(localStorage.getItem('addtocartcount'));

                }

            } else {
                const tp = this.cdata.findIndex((c) => {
                    return c.id == id;

                });
                if (tp > -1) {
                    this.cdata[tp].count = this.actioncount[id];
                    localStorage.setItem('addtocartlist', JSON.stringify(this.cdata));
                    let totalcount = 0;
                    this.cdata.map((d) => {
                        totalcount += parseInt(d.count);
                    });
                    localStorage.setItem('addtocartcount', JSON.stringify(totalcount));
                    this.$parent.addtocartcount = JSON.parse(localStorage.getItem('addtocartcount'));
                }

            }

        },
        async remove(id) {
            if (this.cartdata !== 0) {
                const removed = await this.removecartitem(id);
                if (removed.data.message == 'success') {
                    window.location.reload();
                }
                console.log(removed)
            } else {
                const tp = this.cdata.findIndex((c) => {
                    return c.id == id;

                });
                if (tp > -1) {
                    const tempcountofcurrentdata=this.cdata[tp].count;

                    this.cdata.splice(tp,1);
                    localStorage.setItem('addtocartlist', JSON.stringify(this.cdata));
                    const minuscountofdeleteddatafromtotalcount=JSON.parse(localStorage.getItem('addtocartcount'))-parseInt(tempcountofcurrentdata);
                    localStorage.setItem('addtocartcount',JSON.parse(minuscountofdeleteddatafromtotalcount));
                    this.$parent.addtocartcount = JSON.parse(localStorage.getItem('addtocartcount'));


                }

            }
        },
        changecountonserver(id, count) {

            return new Promise((resolve, reject) => {
                axios
                    .post(this.$hostname + "/changecount", {id: id, count: count})
                    .then((response) => {
                        resolve(response);
                    });
            });
        },
        removecartitem(id) {
            return new Promise((resolve, reject) => {
                axios.post(this.$hostname + "/removecartitem", {id: id})
                    .then((response) => {
                        resolve(response);
                    });
            });
        },
    }
}
</script>

<style scoped>

</style>
