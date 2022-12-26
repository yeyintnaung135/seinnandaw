<template>
    <div class="sn-pd-input d-flex">
        <input type="number" min="1" name="" id="" v-model.number="product_qty">
        <button @click="clickfunction()">ADD TO CART</button>
    </div>
</template>
<script>
export default {
    props: ['product', 'logined'],
    data: function () {
        return {
            host: '',
            product_qty: 1,
        }
    },
    mounted() {
        console.log('Component mounted.');
    },
    methods: {
        sendaddtocart(data) {

            return new Promise((resolve, reject) => {
                axios
                    .post(this.$hostname + "/storeproducttocart", {id: data, qty: this.product_qty})
                    .then((response) => {
                        resolve(response);
                    });
            });
        },
        async clickfunction() {
            if (window.authuser == 'yes') {
                const afterstore = await this.sendaddtocart(this.product.id);

                let tempcount = JSON.parse(localStorage.getItem('addtocartcount')) + this.product_qty;
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

                    this.product.count= this.product_qty;

                    temparray.push(this.product);
                } else {
                    if(temparray[ind].count == null){
                        temparray[ind].count = this.product_qty;

                    }else{
                        temparray[ind].count += this.product_qty;

                    }
                }

                localStorage.setItem('addtocartlist', JSON.stringify(temparray));


                if (localStorage.getItem('addtocartcount') != null) {
                    let tempcount = JSON.parse(localStorage.getItem('addtocartcount')) + this.product_qty;
                    localStorage.setItem('addtocartcount', JSON.stringify(tempcount));

                } else {
                    localStorage.setItem('addtocartcount', JSON.stringify(this.product_qty));

                }

                this.$parent.addtocartcount = JSON.parse(localStorage.getItem('addtocartcount'));
                console.log(JSON.parse(localStorage.getItem('addtocartlist')));
            }

        }
    }
}
</script>
