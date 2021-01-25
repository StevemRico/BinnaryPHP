import React, { useEffect, useState } from 'react';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { GetUser } from '../services/User.service';

export default function Profile(){
    const [Token, setToken] = useLocalStorage('token','');;
    const [User, setUser] = useState([]);

    useEffect(function () {
        GetUser(Token).then(user => setUser(user));
    }, [])

    console.log(User);

    return(
        <div className=''>
            
        </div>
    )
}