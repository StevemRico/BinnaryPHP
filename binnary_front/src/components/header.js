import React, { useState, useEffect } from 'react';
import { GetUser } from '../services/User.service';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { Link } from 'react-router-dom';
import '../assets/header.css';

export default function HeaderComponent() {

    const [Token, setToken] = useLocalStorage('token', '');
    const [User, setUser] = useState([]);

    useEffect(function () {
        GetUser(Token).then(user => setUser(user))
    }, [])

    const Logout = () => {
        setToken('');
        window.location.href = '/Login';
    }

    if (Token === '') {
        return (
            <>
                <nav>
                    <span className="logo">Binnary</span>
                    <div className='header-menu'>
                        <Link to='/Login' className='LoginRegisterHeader'>Login / Register</Link>
                    </div>
                </nav>
            </>
        )
    } else {

        return (
            <>
                <nav>
                    <span className="logo">Binnary</span>
                </nav>
            </>
        )
    }

}