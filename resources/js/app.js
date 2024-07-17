import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
import axios from 'axios'

// Recupero il form 
const forms = document.querySelectorAll('.destroy-form')

// Ciclo ogni form per aggangiare l'ascolto dell'evento
forms.forEach((form, i) => {

    // Aggancio l'evento
    form.addEventListener('submit',(e) => {
        // Al momento del click sul bottone blocco il codice successivo
        e.preventDefault()

        const modalDelete = document.querySelectorAll('.modal-delete');
        
        modalDelete[i].classList.add('d-block');
        modalDelete[i].classList.remove('d-none');

        const btnYes = document.querySelectorAll('.btn-yes');
        btnYes[i].addEventListener('click', (ev) =>{
            ev.preventDefault();

            form.submit();
        })

        const btnNo = document.querySelectorAll('.btn-no');
        btnNo[i].addEventListener('click', (ev) =>{
            ev.preventDefault();
            
            modalDelete[i].classList.add('d-none');
            modalDelete[i].classList.remove('d-block');
        })
    })

})

const city = document.querySelector('.my-input-address')
let inputSuggestions = document.querySelector('.my-table-suggestions')
const inputLat = document.querySelector('.latitude')
const inputLon = document.querySelector('.longitude')
const checkAddress = document.getElementById('checkAddress')

let indexInputLatLon = null

let inputCity = city.value

let valueCity
let resultAddress
let cancelToken;

city.addEventListener('input', function(){
    valueCity = city.value
    
})

city.addEventListener('keyup', function (){
    if(checkAddress){

        checkAddress.value = 0
    }

    // console.log(checkAddress.value)

    if (cancelToken) {
        cancelToken.cancel();
    }

    cancelToken = axios.CancelToken.source();

    axios.post('http://127.0.0.1:8000/api/address/', {parametro: valueCity}, {
        cancelToken: cancelToken.token
    })
    .then(function (response) {
        
        const suggestions = response.data.response.results;
        if(suggestions){
            inputSuggestions.innerHTML = ''

            suggestions.forEach((el)=>{

                inputSuggestions.innerHTML += `
                    <tr>
                        <td class='result-address'>${el.address.freeformAddress}</td>
                    </tr>
                    <span class='lat' hidden>
                        ${el.position.lat}
                    </span>
                    <span class='lon' hidden>
                        ${el.position.lon}
                    </span>
                    `
            })
        }

        let resultAddress = document.querySelectorAll('.result-address')
        const resultsLat = document.querySelectorAll('.lat')
        const resultsLon = document.querySelectorAll('.lon')
        // const inputLat = document.querySelector('.latitude')
        // const inputLon = document.querySelector('.longitude')

        if(resultAddress){
        
            for(let i = 0; i < resultAddress.length; i++){
                let el = resultAddress[i]
                el.addEventListener('click', ()=>{
                    city.value = resultAddress[i].textContent
                    inputSuggestions.innerHTML = ''
                    inputLat.value = resultsLat[i].innerText.replace(/\s+/g, '')
                    inputLon.value = resultsLon[i].innerText.replace(/\s+/g, '')
                    indexInputLatLon = i
                   // console.log(inputLat)
                })
            }
        }

        // console.log(response.data.response);
        // console.log(resultAddress)
        // console.log(city.value)
    })
})

// i create an object for the error messages
let errors = [];
let inputFields = ['title_apartment','rooms','beds','bathrooms','sqr_meters','img_apartment','complete_address'];

const formsCreate = document.querySelectorAll('.form-create-apartment')

// logic for the address selection
formsCreate.forEach( formCreate => {
    formCreate.addEventListener('submit', (e) => {
        errors = [];
        document.querySelectorAll('.my-error').forEach(el => {
            el.innerText = "";
        });
        // i take all the variables
        const title = document.getElementById('title_apartment');
        const rooms = document.getElementById('rooms');
        const beds = document.getElementById('beds');
        const bathrooms = document.getElementById('bathrooms');
        const sqr_meters = document.getElementById('sqr_meters');
        const img_apartment = document.getElementById('img_apartment');
        const complete_address = document.getElementById('complete_address');
        const allInputFields = document.querySelectorAll('.my-error_check');

        e.preventDefault()
        
        if(checkAddress){
            if(checkAddress.value == false){
                console.log(checkAddress.value)
    
                if(!inputLat.value[indexInputLatLon] && !inputLon.value[indexInputLatLon]) {
                    // console.log(indexLatLon.innerHTML)
                    let obj = {
                        field: 'complete_address',
                        message: 'Seleziona una via tra quelle suggerite.'
                    }
                    errors.push(obj);
                }
            }
        }else{
            if(!inputLat.value[indexInputLatLon] && !inputLon.value[indexInputLatLon]) {
                // console.log(indexLatLon.innerHTML)
                let obj = {
                    field: 'complete_address',
                    message: 'Seleziona una via tra quelle suggerite.'
                }
                errors.push(obj);
            }
        }
        

        
        // TITOLO DELL'ÁPPARTAMENTO
        // sia diverso da stringa vuota, min 5 caratteri
        if(typeof title.value !== 'string' || title.value instanceof String){
            let obj = {
                field: 'title_apartment',
                message: 'Il titolo dell\'appartamento deve essere testuale.'
            }
            errors.push(obj);
        }else if(title.value.length <= 5){
            let obj = {
                field: 'title_apartment',
                message: 'Il titolo dell\'appartamento deve essere lungo almeno 5 caratteri.'
            }
            errors.push(obj);
        }

        // N°"STANZE
        // deve essere un numero intero, minimo 1
        if(Number.isInteger(rooms.value)){
            let obj = {
                field: 'rooms',
                message: 'Il numero delle stanze dev\'essere un intero.'
            }
            errors.push(obj);
        }else if(rooms.value <= 0){
            let obj = {
                field: 'rooms',
                message: 'Il numero delle stanze dev\'essere maggiore di 0.'
            }
            errors.push(obj);
        }
        // N°"CAMERE DA LETTO
        // deve essere un numero intero, minimo 1
        if(Number.isInteger(beds.value)){
            let obj = {
                field: 'beds',
                message: 'Il numero delle camere da letto dev\'essere un intero.'
            }
            errors.push(obj);
        }else if(beds.value <= 0){
            let obj = {
                field: 'beds',
                message: 'Il numero di camere da letto dev\'essere maggiore di 0.'
            }
            errors.push(obj);
        }
        // N°"BAGNI
        // deve essere un numero intero, minimo 1
        if(Number.isInteger(bathrooms.value)){
            let obj = {
                field: 'bathrooms',
                message: 'Il numero dei bagni dev\'essere un intero.'
            }
            errors.push(obj);
        }else if(bathrooms.value <= 0){
            let obj = {
                field: 'bathrooms',
                message: 'Il numero dei bagni dev\'essere maggiore di 0.'
            }
            errors.push(obj);
        }
        // METRI QUADRATI
        // deve essere un numero intero, minimo 5
        if(Number.isInteger(sqr_meters.value)){
            let obj = {
                field: 'sqr_meters',
                message: 'Il numero di metri quarati dev\'essere un intero.'
            }
            errors.push(obj);
        }else if(sqr_meters.value <= 5){
            let obj = {
                field: 'sqr_meters',
                message: 'Il numero di metri quarati dev\'essere maggiore di 5.'
            }
            errors.push(obj);
        }
        // IMMAGINE (non required)
        // deve essere un'ímmagine. minore di 2mb
        if(img_apartment.files.length > 1){
            let obj = {
                field: 'img_apartment',
                message: 'Puoi caricare soltanto un\'immagine.'
            }
            errors.push(obj);
        }else if(img_apartment.files.length === 1){
            const fileSize = img_apartment.files[0].size / 1024;
            if(fileSize > 2048){
                console.log(img_apartment.files[0].size);
                let obj = {
                    field: 'img_apartment',
                    message: 'La dimensione dell\'immagine dev\'essere inferiore a 2 mb.'
                }
                errors.push(obj);
            }
        }

        // document.getElementById('inputFile').addEventListener('change', function(e) {
        //     var file = e.target.files[0];
        //     var imageType = /image.*/;
        
        //     if (!file.type.match(imageType)) {
        //         alert('Il file selezionato non è un\'immagine!');
        //     } else {
        //         alert('Il file selezionato è un\'immagine!');
        //     }
        // }, false);
        // INDIRIZZO COMPLETO
        // sia diverso da stringa vuota
        // deve essere preso dai consigliati
        // DESCRIZIONE (non required)
        // limite del text (65535 caratteri)

        if(errors.length > 0){
            inputFields.forEach(field => {
                errors.forEach(error => {
                    if(error.field === field){
                        
                        document.getElementById(field).insertAdjacentHTML('afterend', "<p class=\"text-danger my-error my-2\">" + error.message + "</p>")
                    }
                });
            });
        }else{
            formCreate.submit();
        }
    })
})

const oldImage = document.querySelectorAll('.current-image')

oldImage.forEach((image, i)=>{
    image.addEventListener('click', function(){

        const clickOnImage = document.querySelectorAll('.click-on-image')

        clickOnImage[i].classList.remove('d-none')
    })
})

// Pseudocodice

/*

Se si accede al controller per la edit -> variabile edit = true
Se edit = true al submit non chiedere di selezionare la via suggerita
Al keyup su campo input via edit = false
se edit = false chiedi di selezionare la via suggerita 

*/


