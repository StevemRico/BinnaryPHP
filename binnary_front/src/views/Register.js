import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import '../assests/loginRegister.css';

function Register() {
  return (
    <>
      <div className='container-loginRegister'>
        <div className='keypad-loginRegister'>
          <Link to='/Login'> <h2>Login</h2> </Link>
          <Link to='/Register'> <h2>Register</h2> </Link>
        </div>
        <form className='FormRegister'>
          <input type="text" placeholder="Email" name="email" />
          <input type="text" placeholder="Password" name="pass" />
          <input type="text" placeholder="Confirm Password" />
          {/* HACER EL MOSTRAR CONTRASEÑA */}
          <input type="text" placeholder="Username" name="username" />
          <input type="text" placeholder="Phone" />
          <button className="registerButtonForm">Sing Up</button>
        </form>
      </div>
    </>
  )
}

export default Register;