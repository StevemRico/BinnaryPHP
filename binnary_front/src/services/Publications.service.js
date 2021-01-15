import axios from "axios";
import { url } from "../assets/env";

export async function GetPublication(Token) {
    axios.interceptors.request.use(
        config => {
            config.headers.authorization = `Bearer ${Token}`;
            return config;
        },
        error => {
            return Promise.reject(error);
        }
    )
    return await axios.get(`${url}Publications`)
        .then(response => {
            // console.log(response);
            const publication = response.data.publications;
            return publication;
        })
}