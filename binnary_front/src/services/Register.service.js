import {url} from '../assets/env';
import axios from 'axios';

export default function RegisterPost (RegisterForm){
    axios.post(`${url}Register`, RegisterForm)
        .then(response => { 
            window.location.href = '/Login'
        }).catch(
            
        )
}