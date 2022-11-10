<template>
    <div class="sn-pd-input d-flex">
        <input type="number" name="" id="" value="1">
        <button @click="clickfunction()">ADD TO CART</button>
    </div>
</template>
<script>
export default {
    props: ['product', 'logined'],
    data: function () {
        return {
            host: ''
        }
    },
    mounted() {
        console.log('Component mounted.');
    },
    methods: {
        sendaddtocart(data) {

            return new Promise((resolve, reject) => {
                axios
                    .post(this.$hostname + "/storeproducttocart", {id: data})
                    .then((response) => {
                        resolve(response);
                    });
            });
        },
        async clickfunction() {
            if (window.authuser == 'yes') {
                const afterstore = await this.sendaddtocart(this.product.id);

                let tempcount = JSON.parse(localStorage.getItem('addtocartcount')) + 1;
                localStorage.setItem('addtocartcount', JSON.stringify(tempcount));

                this.$parent.addtocartcount = JSON.parse(localStorage.getItem('addtocartcount'));
            } else {
                if (localStorage.getItem('addtocartlist') != null) {
                    var temparray = JSON.parse(localStorage.getItem('addtocartlist'));

                } else {
                    var temparray = [];
                    temparray[0] = this.product;

                }
                ;
                var ind = temparray.findIndex((t) => {
                    return t.id == this.product.id
                })
                if (ind == -1) {

                    this.product.count= 1;

                    temparray.push(this.product);
                } else {
                    if(temparray[ind].count == null){
                        temparray[ind].count = 1;

                    }else{
                        temparray[ind].count += 1;

                    }
                }

                localStorage.setItem('addtocartlist', JSON.stringify(temparray));


                if (localStorage.getItem('addtocartcount') != null) {
                    let tempcount = JSON.parse(localStorage.getItem('addtocartcount')) + 1;
                    localStorage.setItem('addtocartcount', JSON.stringify(tempcount));

                } else {
                    localStorage.setItem('addtocartcount', JSON.stringify(1));

                }

                this.$parent.addtocartcount = JSON.parse(localStorage.getItem('addtocartcount'));
                console.log(JSON.parse(localStorage.getItem('addtocartlist')));
            }

        }
    }
}
</script>
