require('./bootstrap');
// require('../../public/js/stat');
// var Chart = require('chart.js');
// const $ = require('jquery');
// window.axios = require('axios');
import Vue from 'vue';
// import Chart from 'chart.js/auto';
import axios from 'axios';


//braintree
// {
//     "require" : {
//         "braintree/braintree_php" : "5.5.0"
//     }
// }
// const $ = require('./jquery');
// 
// const { default: axios } = require("axios");

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        footerLinks: ['© 2021 BoolBnb Inc. - All rights reserved', 'Privacy', 'Termini', 'Mappa del sito', 'Dettagli dell\'azienda'],
        socialLinks: [
            {
                name: 'GitHub',
                icon: 'fab fa-github'
            },
            {
                name: 'Linkedin',
                icon: 'fab fa-linkedin-in'
            },
            {
                name: 'Instagram',
                icon: 'fab fa-instagram'
            },
            {
                name: 'Twitter',
                icon: 'fab fa-twitter'
            },
            {
                name: 'Facebook',
                icon: 'fab fa-facebook-f'
            }
        ],
        citiesBox:[
            {
                city: 'Roma',
                description: 'Città Eterna',
                img: 'https://images.unsplash.com/photo-1569343051690-6dd6475dc776?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80'
            },
            {
                city: 'Milano',
                description: 'Smart-City Life',
                img: 'https://images.unsplash.com/photo-1530284610319-31ee7c55378e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80'
            },
            {
                city: 'Firenze',
                description: 'Arte e Cultura Rinascimentale',
                img: 'https://images.unsplash.com/photo-1527152272644-1af27a5c00cc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80'
            },
            {
                city: 'Napoli',
                description: 'Folclore partenopeo',
                img: 'https://images.unsplash.com/photo-1527152272644-1af27a5c00cc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80'
            }
        ],
        mainMenu: false,
        ricerca: "",
        ricercaToUpper: "",
        nomeToUpper: "",
        apartments: '',
        currentUrl: window.location.pathname,
        myLocal: 'http://localhost:8000/api/statistiche/',
        lastItem: '',
        risultato_mesi: [],
        language: 'it-IT',
        apiKey: '581ptADhY1xisfyvdt8ITvz3d78O66H6',
        array_tom: [],
        json: '.json',
        array_visite: '',
        array_visite_appartmenti: '',
        mesi: [],
        n_visite: [],
        array_completo: [],
        months: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile'],
        indirizzo:'',
        latitude:0,
        longitude:0,
        array_slider: [],
        pippo: 0,
        route: '/apartment/',
        contatore: 0,
        via: '',
        numero_civico:1,
        CAP: 1,
        citta: '',
        provincia: '',
        stato:'Italia',
        advancedSearch: false,
        nightPrice: '',
        nights: 1,
        adults: 1,
        childrens: 0

    },
    // created(){
    //     console.log(this.lastItem);

    // },
    mounted() {
        this.slider();
        this.lastItem = this.currentUrl.substring(this.currentUrl.lastIndexOf('/') + 1);
        this.loadVisitors();
        this.prova();
        this.showPrice();
        console.log(this.nights);
    },
    methods: {
        prova(){

            var latitude = document.getElementById("dom-lat").textContent;
            var longitudine = document.getElementById("dom-lon").textContent;

            // centro della mappa
            var HQ = { lat: latitude, lng: longitudine }
            console.log(HQ);

            // visualizzazione della mappa
            var map = tt.map({
                key: '3Lb6xSAA2aORuhekPk7epa88Y9SpvSla',
                container: 'map',
                center: HQ,
                zoom: 15
            });

            var marker = new tt.Marker().setLngLat(HQ).addTo(map);

        },
        // FUNZIONE PER MOSTRARE/NASCONDERE MENU DROPDOWN HEADER
        showMenu() {
            this.mainMenu = !this.mainMenu;
        },
        // DISATTIVARE SCROLL PAGINA
        disableScroll() {
            document.body.style.overflow = 'hidden';
            document.querySelector('html').scrollTop = window.scrollY;
        },
        // ATTIVO DROPDOWN RICERCA AVANZATA
        showSrc() {
            this.advancedSearch = !this.advancedSearch;
        },
        tomtom()
        {
            axios.get('https://api.tomtom.com/search/2/search/' + this.citta + '.json?',
            {
                params: {
                    
                    limit: 1,
                    key: '3ZJWFcBWKUg3rC731Tp0W3ytemg6tt3O'
                    
                }
            })
            .then(result => {

                this.array_tom = result.data.results;
                console.log(this.array_tom);

            });
        },
        showPrice() {
            axios.get('http://localhost:8000/api/prezzo/' + this.lastItem)
                .then(result => {
                    this.nightPrice = result.data.apartment.price;
                })
        },
        loadVisitors() {
            axios.get('http://localhost:8000/api/statistiche/' + this.lastItem)
                .then(result => {
                    this.array_visite = result.data.numero_visite;
                    this.array_visite_appartmenti = result.data.apartment;
                    
                    this.array_visite.forEach(element => {
                        // console.log(element.totale, 'sono element');
                        // console.log(element);
                        this.mesi.push(element.numero_mese);
                        this.n_visite.push(element.totale);
                        // console.log(this.n_visite);
                        
                        
                        
                    });


                    
                    
                    
                    var mesi = this.mesi;
                    
                    var n_visite = this.n_visite;
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            // labels: mesi,
                            labels: ['January', 'February', 'March', 'April'],


                            datasets: [{
                                label: 'Le tue visite mensili',
                                data: n_visite,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 1)',

                                    'rgba(12, 50, 22, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',

                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                    
                                }
                            }
                        },

                    });

                });
        },
        getPosition(){
            // this.andress = 'Corso Galileo Ferraris, 35, 10121 Torino TO';
            // axios.defaults.headers.common['X-Requested-With'];
            this.indirizzo = this.via + ' ' + this.numero_civico + ', ' + this.CAP + ' ' + this.citta + '' + this.provincia;
            axios
                axios.get('https://api.tomtom.com/search/2/search/' + this.indirizzo + '.json?',{
                    params: {
                        key: '3Lb6xSAA2aORuhekPk7epa88Y9SpvSla'
                    }
                })
                .then( response  => {

                    // centro della mappa
                    // console.log(response);
                    var point = response.data.results[0].position;
                    // console.log(point);
                    this.latitude = point.lat;
                    this.longitude = point.lon;
                })
                .catch(error => console.error('get position', error)); 
        },
        setIndirizzo(andress){
            this.indirizzo = andress;
        },
        aptLink(index) {
            // console.log(index,'lo prendi il click');
            // if(index == this.array_slider[this.contatore]){
            //     console.log('ciao');
            // }
            window.location.href = '/apartment/' + this.array_slider[index].slug;
        },


        slider(){
            
            axios.get('http://localhost:8000/api/slider')
            .then( response => {
                this.array_slider = response.data.apartmentSponsored;
                console.log(this.array_slider[0]);
            })
        }, 
        nextImg() {


            let larghezzaImg = document.getElementsByClassName('container-img')[0].offsetWidth;
            console.log(larghezzaImg);
            const container = document.getElementsByClassName('invisibile')[0];
            console.log(container);

            const larghezzaContenitore = container.offsetWidth;
            console.log(larghezzaContenitore);

            const scrollLeft = Math.abs(container.style.left.replace('px', ''));
            console.log(scrollLeft);

            const larghezzaInner = document.getElementsByClassName('img-array')[0].offsetWidth;
            console.log(larghezzaInner);


            if (scrollLeft > (larghezzaContenitore - larghezzaInner - larghezzaImg)) {
                return;

            }

            this.pippo -= larghezzaImg;
            console.log(scrollLeft, 'io sono scroll left');

            console.log(this.pippo, 'io sono pippo');
            console.log(container, 'container');


        },
        prevImg() {
            var blocco = true;

            this.countImg--;
            let larghezzaImg = document.getElementsByClassName('container-img')[0].offsetWidth;
            console.log(larghezzaImg);
            const container = document.getElementsByClassName('invisibile')[0];
            console.log(container);

            const larghezzaContenitore = container.offsetWidth;
            console.log(larghezzaContenitore);

            const scrollRight = Math.abs(container.style.left.replace('px', ''));
            console.log(scrollRight);

            const larghezzaInner = document.getElementsByClassName('img-array')[0].offsetWidth;
            console.log(larghezzaInner);


            if (this.pippo == 0) {
                return blocco = false;
            }

            if (scrollRight > (larghezzaContenitore + larghezzaInner + larghezzaImg)) {
                console.log(scrollRight);
                return;
            }
            this.pippo += larghezzaImg;
            console.log(scrollRight, 'Io sono scrollRight');

            console.log(this.pippo, 'io sono pippo');
            console.log(container, 'container');
        }
    }
});



