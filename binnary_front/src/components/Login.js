import React, {useState} from 'react';
import { Link } from 'react-router-dom';
import {url} from '../assets/env';
import axios from 'axios';
import { useLocalStorage } from '../hooks/useLocalStorage';
import '../assets/loginRegister.css';

export default function Login() {
    const [Token, setToken] = useLocalStorage('token', '');

    const [Login, setLogin] = useState({ username: '', password: '' });

    const handleSubmit = e => { e.preventDefault(); }
    
    const handleChange = async e => {
        await setLogin({
            ...Login,
            [e.target.name]: e.target.value
        })
    }

    const Post = () => { 
        axios.post(`${url}Login`,Login)
        .then(response => {
            // console.log(response.data);
            if(response.data === 'Usuario o contraseña son incorrectas'){
                alert('Usuario o contraseña son incorrectas');
            }else{
                setToken(response.data);
                window.location.href = '/'
            }
        })
    }

    return (
        <div className='grid-loginRegister'>
            <div className='container-loginRegister'>
                <div className='keypad-loginRegister'>
                    <Link to='/Login' className='LoginRegister'> Login </Link>
                    <Link to='/Register' className='LoginRegister'> Register </Link>
                </div>
                <form className='FormLogin' onSubmit={handleSubmit}>
                    <input type="text" className='Username' placeholder="Username" name="username" onChange={handleChange} />
                    <input type="password" className='Password' placeholder="Password" name="password" onChange={handleChange} />
                    {/* HACER EL MOSTRAR CONTRASEÑA */}
                    <h5>Forgot your password?</h5>
                    <button onClick={Post}>Login</button>
                </form>
            </div>
        </div>
    )
}