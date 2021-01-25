import React, { useState } from "react";
import Axios from "axios";
import { url } from "../assets/env";

function PostPublication() {
  const [name, setName] = useState();
  const [file, setFile] = useState();

  const send = event => {
    const data = new FormData();
    data.append("name", name);
    data.append("file", file);

    Axios.post(`${url}Publications`, data)
      .then(res =>
        // console.log(res)
        window.location.href = '/Home'
      ).catch(err =>
        console.log(err)
      );
  };

  return (
    <div className='PublicationUpload'>
      <form action="#">
          <input
          className='PublicationUpload-description'
            placeholder='description'
            type="text"
            id="name"
            onChange={event => {
              const { value } = event.target;
              setName(value);
            }}
          />
          <br/>
          <input
          className='PublicationUpload-file'
            type="file"
            id="file"
            onChange={event => {
              const file = event.target.files[0];
              setFile(file);
            }}
          />
      </form>
      <button onClick={send} className='PublicationUpload-button'>Post</button>

    </div>
  );
}

export default PostPublication;