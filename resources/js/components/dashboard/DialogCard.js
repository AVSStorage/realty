import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Login from "../LoginComponent";

export default function DialogCard({messages}) {

    return messages.map((message) => {
        return (
        <div className={`attention`}>
            <div className={`attention__inner ${Number(message.info.status) === 3 ? 'alert alert-danger' : ''}`}>
                <div className="attention__left">
                    <img src={`/${message.photos[0].name}`} alt="Summer"/>
                </div>
                <div className="attention__right">
                    <div className="perosnal__left-rev">
                        <img src={message.info.avatar} alt="Person" width={"45"} height={"45"} className="personal__photo"/>
                        <div className="personal__name">{ message.info.name} <span
                            className="personal--grey">по объекту</span><br/><span className="personal__hotels">{message.info.address }</span>
                        </div>
                    </div>
                    <div className="personal__rev__inner">
                    <div className="personal__rev-only">
                        {message.message.length > 0 ? message.message[0].message : ''}
                    </div>

                    {(Number(message.info.status)  === 0 && message.type !== 'userOrders') && (
                        <div className="center__rev-btn">
                            <a href="#" className="peronal__rev__btn">Предложить бронь</a>
                        </div>
                    )}
                    </div>
                    <div className="attention__footer-inner">
                        <div className="attention__footer-right">
                            <img src="/img/personal/1.png" width="30" alt="Good"/>
                        </div>
                        <div className="attention__footer-left-1">
                            <div className="attention__footer-text-inner">
                                {Number(message.info.status) === 1 && (
                                    <div className="attetion__footer-text-1">
                                        <span className="attetion-green">Забронировано</span><br/>
                                        с {message.info.date_from} по {message.info.date_to}
                                    </div>
                                )}
                                {Number(message.info.status) === 0 && (
                                    <div className="attetion__footer-text-4">
                                        <span className="attention__orange">Не забронировано</span><br/>
                                        с {message.info.date_from} по {message.info.date_to}
                                    </div>
                                )}

                                {Number(message.info.status) === 3 && (
                                    <div className="attetion__footer-text-4">
                                        <span className="attention__orange text-danger">Отклонено</span><br/>
                                        с {message.info.date_from} по {message.info.date_to}
                                    </div>
                                )}


                                <div className="attetion__footer-text-2">
                                    <a className="attention__footer-btn" href={message.info.admin ? `/admin/messages/edit/${message.info.id}/${message.info.ownerId}/${message.info.object_id}` : `/messages/${message.info.id}/${message.info.object_id}`}>
                                        Перейти к диалогу
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ) })
}

