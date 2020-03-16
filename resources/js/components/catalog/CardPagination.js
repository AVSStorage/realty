import React, { Component } from 'react';
import ReactDOM from "react-dom";
import {useStoreActions, useStoreContext} from "../../store/store";


const CardPagination = () => {

    const globalStore = useStoreContext();
    const { paginateLinksArray,page } = globalStore.filteredItems;
    const { limit} = globalStore;
    const {paginateCards} = useStoreActions();



    return (
        <div className="choice__next-check">
            {
                paginateLinksArray.map((item) => <div onClick={() => paginateCards(item, limit)} className={`choice__next-click ${ page === item ? 'active' : '' }`}>{item}</div>)
            }
        </div>
    )
}


export default CardPagination;
