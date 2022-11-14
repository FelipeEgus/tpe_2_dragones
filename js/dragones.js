"use strict"

const URL = "api/dragon/";

let dragones = [];

let form = document.querySelector('#character-form');
form.addEventListener('submit', insertCharacter);


async function getAll() {
    try {
        let response = await fetch(URL);
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        dragones = await response.json();

        showDragones();
    } catch(e) {
        console.log(e);
    }
}



async function addDragon(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let dragon = {
        nombre: data.get('nombre_raza'),
        descrip: data.get('descrip'),
        repre: data.get('representaciones'),
        mitologia: data.get('id_mitologia_fk'),

    };

    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(dragon)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let nDragon = await response.json();


        dragones.push(nDragon);
        showDragones();

        form.reset();
    } catch(e) {
        console.log(e);
    }
} 

async function deleteDragon(e) {
    e.preventDefault();
    try {
        let id = e.target.dataset.dragon;
        let response = await fetch(URL + id, {method: 'DELETE'});
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        dragones = dragones.filter(dragon => dragon.id != id);
        showDragones();
    } catch(e) {
        console.log(e);
    }
}

function showDragones() {
    let ul = document.querySelector("#character-list");
    ul.innerHTML = "";
    for (const dragon of dragones) {

        let html = `
        <table>
            <thead>
                <tr>
                    <th>dragon</th>
                    <th>mitologia</th>
                    <th>descrip</th>
                    <th>representaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>${dragon.nombre_raza}</td>
                    <td>${dragon.origen_mitologico}</td>
                    <td>${dragon.descrip}</td>
                    <td>${dragon.representaciones}</td>
                </tr>
            </tbody>
        </table>
        `;

        ul.innerHTML += html;
    }


    const btnsDelete = document.querySelectorAll('a.btn-delete');
    for (const btnDelete of btnsDelete) {
        btnDelete.addEventListener('click', deleteCharacter);
    }
}

getAll();
