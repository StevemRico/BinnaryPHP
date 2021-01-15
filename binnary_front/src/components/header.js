import React, { useState, useEffect } from 'react';
import { GetUser } from '../services/User.service';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { Link } from 'react-router-dom';

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
                    <label className="logo">Binnary</label>
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
                    <label className="logo">Binnary</label>
                    <div className='header-menu'>
                        {
                            User.map(userA => {
                                return (
                                    <section key={userA.id_user} className='header-menu-img'>
                                        <img src={userA.profile_image} alt={userA.profile_image} className='imgprofileheader' />
                                    </section>
                                )
                            })
                        }
                        <div className="header-dropdown-content">
                            <p onClick={Logout}>Logout</p>
                            <p>
                                <i class="fab fa-facebook-messenger"></i>
                            </p>
                        </div>
                    </div>
                </nav>
            </>
        )
    }

}