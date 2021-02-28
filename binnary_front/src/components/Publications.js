import React, { useEffect, useState } from 'react';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { GetPublication } from '../services/Publications.service';
import { Link } from 'react-router-dom';
import '../assets/publications.css'

export default function Publications() {

    const [Token, setToken] = useLocalStorage('token', '');
    const [Publication, setPublication] = useState([]);
    const [PublicationUnique, setPublicationUnique] = useState([]);

    useEffect(function () {
        GetPublication(Token).then(publication => setPublication(publication))
    }, [])

    const openModal = () => {
        const id = 11;
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
    console.log(Publication);
    return (
        <div className='grid-publication'>
            {
                Publication.map(publi => {
                    return (
                        <Link to={{ pathname: `/Publication/${publi.id_publication}`, state: publi.id_publication }} key={publi.id_publication} className='grid-publication-link'>
                            <div className='grid-publication-unique' id={publi.id_publication} key={publi.id_publication}>
                                <div className='publication-profile'>
                                    <img src={publi.profile_image} alt={publi.profile_image} />
                                    <label>{publi.username}</label>
                                </div>
                                <div className='publication-img'>
                                    <img className='publicationimg' src={publi.File} alt={publi.File} />
                                </div>
                            </div>
                        </Link>
                    )
                })
            }
            {/* <div id="myModal" className="modal">
                <div className="modal-content">
                    <span className="close" onClick={closeModal}>&times;</span>
                    <div className=''>
                        
                    </div>
                </div>
            </div> */}
        </div>
    )
}