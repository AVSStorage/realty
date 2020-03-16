import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default function ChatForm({sendMessage, newMessage, updateMessage}) {
    return (
        <form onSubmit={sendMessage} className="persona__border-area">
            <div className="persona__text-area">
                <textarea onChange={updateMessage} value={newMessage} placeholder="Ваше сообщение"></textarea>
            </div>
            <button type="submit" className="btn  form--btn  house--btn">Отправить</button>
        </form>
    )
}
