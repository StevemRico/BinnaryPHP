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
            const publication = response.data;
            return publication;
        })
}

export async function GetUniquePublication(Token,id) {
    axios.interceptors.request.use(
        config => {
            config.headers.authorization = `Bearer ${Token}`;
            return config;
        },
        error => {
            return Promise.reject(error);
        }
    )
    return await axios.get(`${url}Publications/${id}`)
        .then(response => {
            // console.log(response);
            const publicationunique = response.data;
            return publicationunique;
        })
}

export async function PostPublicationS(Token,Publication){
    axios.interceptors.request.use(
        config => {
            config.headers.authorization = `Bearer ${Token}`;
            return config;
        },
        error => {
            return Promise.reject(error);
        }
    )
    return await axios.post(`${url}Publications`, Publication)
        .then(response => {
            // console.log(response);
            const publicationunique = response.data;
            return publicationunique;
        })
}
