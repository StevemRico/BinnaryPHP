import React, { useState, useEffect } from 'react';
import { GetUser } from '../services/User.service';
import { useLocalStorage } from '../hooks/useLocalStorage';
import '../assets/sidemenu.css';
import { Link } from 'react-router-dom';

export default function Sidebar() {
    const [Token, setToken] = useLocalStorage('token', '');
    const [User, setUser] = useState([]);

    useEffect(function () {
        GetUser(Token).then(user => setUser(user));
    }, [])

    const Logout = () => {
        setToken('');
        window.location.href = '/Login';
    }

    const sidebarexpanded = () => {
        const side = document.querySelector('#sidemenu');
        // const sidewidth = document.querySelector(':root');
        side.classList.toggle("sidemenu-menu-expanded");
        side.classList.toggle("sidemenu-menu-collapsed");
        if (side.className === 'sidemenu-menu-expanded') {
            // sidewidth.style.setProperty('--sidemenu-width','250px');
        } else if (side.className === 'sidemenu-menu-collapsed') {
            // sidewidth.style.setProperty('--sidemenu-width','50px');
        }
    }
    return (
        <div className='sidemenu-menu-collapsed' id='sidemenu'>
            <div className='sidemenu-header'>
                <span>Binnary</span>
            </div>
            <div className='sidemenu-btn' onClick={sidebarexpanded}>
                <i className="fas fa-bars"></i>
            </div>
            {
                User.map(userA => {
                    return (
                        <div className='sidemenu-profile' key={userA.id_user}>
                            <div className='sidemanu-img-profile'>
                                <img src={userA.profile_image} alt='0' />
                            </div>
                            <div className='sidemenu-username'>
                                <span>
                                    {userA.username}
                                </span>
                            </div>
                            <div className='sidemenu-follow'>
                            </div>
                        </div>
                    )
                })
            }
            <div className='sidemenu-items'>
                <Link to='/' className='sidemenu-item-search'>
                    <div className='sidemenu-item-logo'>
                        <i className="fas fa-search"></i>
                    </div>
                    <div className='sidemenu-item-text'>
                        <input type='text' placeholder='Search' />
                    </div>
                </Link>
                <Link to='/Home' className='sidemenu-item'>
                    <div className='sidemenu-item-logo'>
                        <i className="fas fa-home"></i>
                    </div>
                    <div className='sidemenu-item-text'>
                        <span>Home</span>
                    </div>
                </Link>
                <Link to='/Profile' className='sidemenu-item'>
                    <div className='sidemenu-item-logo'>
                        <i className="fas fa-user-alt"></i>
                    </div>
                    <div className='sidemenu-item-text'>
                        <span>Profile</span>
                    </div>
                </Link>
                <Link to='/PostPublications' className='sidemenu-item'>
                    <div className='sidemenu-item-logo'>
                        <i className="fas fa-upload"></i>
                    </div>
                    <div className='sidemenu-item-text'>
                        <span>Post Publications</span>
                    </div>
                </Link>
                <Link to='Messages' className='sidemenu-item'>
                    <div className='sidemenu-item-logo'>
                        <i className="fas fa-comment-alt"></i>
                    </div>
                    <div className='sidemenu-item-text'>
                        <span>Messages</span>
                    </div>
                </Link>
            </div>
            <div className='sidemenu-logout' onClick={Logout}>
                <Link to='' className='sidemenu-item'>
                    <div className='sidemenu-item-logo'>
                        <i className="fas fa-power-off"></i>
                    </div>
                    <div className='sidemenu-item-text'>
                        <span>Logout</span>
                    </div>
                </Link>
            </div>
        </div>
    )
}