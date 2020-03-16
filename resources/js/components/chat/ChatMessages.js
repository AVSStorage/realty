
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default function ChatMessages({messages}) {
    return messages.map((message) => (
        <div className="personal__inner-only">
            <div className="personal__left-review">
                <div className="perosnal__left-rev">
                    <img src="/img/content/3.png" alt="Person" className="personal__photo"/>
                    <div className="personal__name">{message.user.name}
                    {/*<p  className="personal__hotel">{message.object.name}</p>*/}
                    </div>

                </div>
                <div className="personal__left-date">
                    <div className="personal__left-dat">
                        {message.created_at ? message.created_at : '12-10-01'}
                    </div>
                    <div className="personal__left-check">
                        {Number(message.status) ? 'прочитано' : 'не прочитано'}
                    </div>
                </div>
            </div>
            <div className="personal__rev-only">
                {message.message}
            </div>
        </div>
    ));
}
