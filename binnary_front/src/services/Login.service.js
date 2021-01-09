import {url} from '../assets/env';
import axios from 'axios';

export default function LoginPost (LoginForm){
    axios.post(`${url}Login`,LoginForm)
        .then(response => {
            const token = response.data.token;
            return token;
        })
}