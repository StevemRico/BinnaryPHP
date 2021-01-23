import React, { useEffect, useState } from 'react';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { GetPublication } from '../services/Publications.service';
import '../assets/publications.css'

export default function Publications() {

    const [Token, setToken] = useLocalStorage('token', '');
    const [Publication, setPublication] = useState([]);

    useEffect(function () {
        GetPublication(Token).then(publication => setPublication(publication))
    }, [])

    const openModal = () => {
        const modal = document.querySelector('#myModal');
        modal.style.display = "block";
    }

    const closeModal = () => {
        const modal = document.querySelector('#myModal');
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        const modal = document.querySelector('#myModal');
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

    const sidebarexpanded = () => {
        const side = document.querySelector('#sidemenu');
        const sidewidth = document.querySelector(':root');
        side.classList.toggle("sidemenu-menu-expanded");
        side.classList.toggle("sidemenu-menu-collapsed");
        if (side.className == 'sidemenu-menu-expanded') {
            // sidewidth.style.setProperty('--sidemenu-width','250px');
        } else if (side.className === 'sidemenu-menu-collapsed') {
            // sidewidth.style.setProperty('--sidemenu-width','50px');
        }
    }

    return (
        <div className='grid-publication'>
            {
                Publication.map(publi => {
                    return (
                        <div className='grid-publication-unique' key={publi.id_publication} onClick={openModal}>
                            <div className='publication-profile'>
                                <img src={publi.profile_image} alt={publi.profile_image} />
                                <label>{publi.username}</label>
                            </div>
                            <div className='publication-img'>
                                <img className='publicationimg' src={publi.File} alt={publi.File} />
                            </div>
                        </div>
                    )
                })
            }
            <div id="myModal" className="modal">
                <div className="modal-content">
                    <span className="close" onClick={closeModal}>&times;</span>
                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    )
}