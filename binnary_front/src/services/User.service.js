import axios from "axios";
import { url } from "../assets/env";

export async function GetUser(Token) {
    axios.interceptors.request.use(
        config => {
            config.headers.authorization = `Bearer ${Token}`;
            return config;
        },
        error => {
            return Promise.reject(error);
        }
    )
    return await axios.get(`${url}Users/Header`)
        .then(response => {
            console.log(response.data.authdata.row);
            const user = response.data.authdata.row;
            return user;
        })
}