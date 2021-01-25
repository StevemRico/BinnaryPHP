import React, { useEffect, useState } from 'react';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { GetUniquePublication } from '../services/Publications.service';
import '../assets/ProductUnique.css';

export default function PublicationUnique(id){

    const [Token, setToken] = useLocalStorage('token','');
    const [Publication, setPublication] = useState([]);

    useEffect(function () {
        GetUniquePublication(Token,id.location.state).then(publicationunique => setPublication(publicationunique))
    }, [])

    if(Publication.length === 0){
        return (
            <div>
                <h1>Vacio</h1>
            </div>
        )
    }else{
        return (
            <div className="UniqueP">
                <div className="image-UniqueP">
                    <img src={Publication[0].File} alt=""/>
                </div>
                <div className="Comments-UniqueP">
                    <div className="User-UniqueP">
                        <img src={Publication[0].profile_image} alt=""/>
                        <label>{Publication[0].username}</label>
                    </div>
                </div>
            </div>
        )
    }

}