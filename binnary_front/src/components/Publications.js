import React, { useEffect, useState } from 'react';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { GetPublication } from '../services/Publications.service';

export default function Publications() {

    const [Token, setToken] = useLocalStorage('token', '');
    const [Publication, setPublication] = useState([]);

    useEffect(function () {
        GetPublication(Token).then(publication => setPublication(publication))
    }, [])

    console.log(Publication);

    return (
        <div className='grid-publication'>
            {
                Publication.map(publi => {
                    return (
                    <div className='grid-publication-unique' key={publi.id_publication}>
                        <div className='publication-profile'>
                            <img src={publi.profile_image} alt={publi.profile_image} />
                            <label>{publi.Username}</label>
                        </div>
                        <div className='publication-img'>
                            <img className='publicationimg' src={publi.File} alt={publi.File} />
                        </div>
                    </div>
                    )
                })
            }
        </div>
    )
}