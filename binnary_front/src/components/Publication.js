import React, { useState, useEffect } from 'react';
import GetPublication from '../services/Publication.service';

export default function PublicationComponent(){
    const [data, setData] = useState([]);

    useEffect(() => {
        GetPublication.then(publication => setData(publication));
    }, []);

    return(
        <>
        </>
    )
}