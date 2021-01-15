import React,{useState} from 'react';
import { Link } from 'react-router-dom';
import RegisterPost from '../services/Register.service';

export default function Register() {

    const [Register, setRegister] = useState({
        username: '',
        email: '',
        password: '',
        phone: ''
    });

    const handleSubmit = e => { e.preventDefatult(); }

    const handleChange = async e => {
        await setRegister({
            ...Register,
            [e.target.name]: e.target.value
        })
    }

    const Post = () => { RegisterPost(Register); }

    return (
        <div className='grid-loginRegister'>
            <div className='container-loginRegister'>
                <div className='keypad-loginRegister'>
                    <Link to='/Login' className='LoginRegister'> Login </Link>
                    <Link to='/Register' className='LoginRegister'> Register </Link>
                </div>
                <form className='FormRegister' onSubmit={handleSubmit}>
                    <input type="text" placeholder="Username" name="username" autoComplete='off' onChange={handleChange} />
                    <input type="text" placeholder="Email" name="email" autoComplete='off' onChange={handleChange} />
                    <input type="password" placeholder="Password" name="password" autoComplete='off' onChange={handleChange} />
                    <input type="password" placeholder="Confirm Password" autoComplete='off' />
                    {/* HACER EL MOSTRAR CONTRASEÑA */}
                    <input type="text" placeholder="Phone" name='phone' autoComplete='off' onChange={handleChange} />
                    <button className="registerButtonForm" onClick={Post}>Sing Up</button>
                </form>
            </div>
        </div>
    )
}