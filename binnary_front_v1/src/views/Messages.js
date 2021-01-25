import React, { useEffect, useState } from 'react';
import { useLocalStorage } from '../hooks/useLocalStorage';
import { GetMessage } from '../services/Message.service';
import { GetUser } from '../services/User.service';
import '../assets/messages.css'

export default function Messages() {

    const [Token, setToken] = useLocalStorage('token', '');
    const [Messages, setMessages] = useState([]);
    const [User, setUser] = useState([]);


    useEffect(() => {
        GetMessage(Token).then(message => setMessages(message));
        GetUser(Token).then(user => setUser(user));
    }, []);

    return (
        <div className='messages'>
            <div className='messages-sala'>
                
            </div>
        </div>
    )
}