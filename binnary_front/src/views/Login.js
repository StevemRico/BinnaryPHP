import React from 'react';
import { Link } from 'react-router-dom';
import '../assests/loginRegister.css';

export default function Login() {

  return (
    <>
      <div className='container-loginRegister'>
        <div className='keypad-loginRegister'>
          <Link to='/Login'> <h2>Login</h2> </Link>
          <Link to='/Register'> <h2>Register</h2> </Link>
        </div>
        <form className='FormLogin'>
          <input type="text" className='Username' placeholder="Username" name="" />
          <input type="password" className='Password' placeholder="Password" name="" />
          {/* HACER EL MOSTRAR CONTRASEÑA */}
          <h5>Forgot your password?</h5>
          <button>Login</button>
        </form>
      </div>
    </>
  )
}