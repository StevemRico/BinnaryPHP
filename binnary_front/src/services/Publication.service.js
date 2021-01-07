import { uri } from "./env";

export default function GetPublication(){
    return fetch(uri)
            .then(res => res.json())
            .then(response => {
                const publication = response.map(publication => publication);
                // console.log(product);
                return publication;
            })
}