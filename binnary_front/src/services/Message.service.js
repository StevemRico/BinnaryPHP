import axios from "axios";
import { url } from "../assets/env";

export async function GetMessage(Token) {
    axios.interceptors.request.use(
        config => {
            config.headers.authorization = `Bearer ${Token}`;
            return config;
        },
        error => {
            return Promise.reject(error);
        }
    )
    return await axios.get(`${url}Messages`)
        .then(response => {
            // console.log(response);
            const message = response.data.message;
            return message;
        })
}