const { last } = require("lodash");

var stat = new Vue({
    el: '#stat',
    data: {
        messaggi: 'ciaoo uaooo',
        currentUrl: window.location.pathname,
        myLocal: 'http://localhost:8000/api/statistiche/',
        lastItem: '',
        risultato_mesi: [],
        array_visite: [],


    },
    mounted(){
        console.log(this.currentUrl);
        lastItem = this.currentUrl.substring(this.currentUrl.lastIndexOf('/') + 1);
        loadVisitors() ;
        console.log(lastItem);
    },
    methods:{
        loadVisitors() {
            axios.get('http://localhost:8000/api/statistiche/' + this.lastItem)
                .then(result => {
                    this.array_visite = result.data.numero_visite;
                    console.log(this.array_visite);
                    console.log(result.data.numero_visite);
                    this.array_visite.forEach(element => {
                        console.log(element.totale, 'sono element');
                        console.log(element.numero_mese);
                        this.risultato_mesi.push(element.numero_mese);

                        console.log(this.risultato_mesi, 'sono risultato mesi');
                    });

                });
        },
    }
})