var app = new Vue({
    el: '#table-calc',
    data: {
        table:[{
            name:'',
            cnt: null,
            price:null,
            priceRow:null
        }],
    },
    computed: {
        total: function(){
            var total = 0;
            for(var i = 0; i<this.table.length; i++){
                var c = 0
                var p = 0
                this.table[i].priceRow = 0
                if(this.table[i].cnt && this.table[i].price){
                    this.table[i].priceRow = this.table[i].cnt.replace(/,/, '.')*this.table[i].price.replace(/,/, '.')
                }
                total += this.table[i].priceRow
            }
            return total
        }

    },
    methods:{
        deleteRow(index){
            this.table.splice(index, 1)
        },
        addRow(){
            this.table.push({
                name:'',
                cnt: null,
                price:null,
                priceRow:null
            })
        }
    },
    /*watch:{

    }*/

})