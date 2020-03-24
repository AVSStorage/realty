import React from 'react';
import PhotosTab from "../components/PhotosTab";
import {StateProvider, useStoreActions, useStoreContext} from "../../../store/store";
import {reducers} from "../../helpers/reducers";
import arrayMove from "array-move";

export default function PhotoTabContainer() {

    const globalState = useStoreContext();
    let {photos, address,filledServices, mainInfo, occupation, update} = globalState;

    let {changeTab, sendData} = useStoreActions();

    if (photos.length < 8) {
        for (let i = photos.length; i < 8; i++) {
            photos.push({
                id: i,
                photo: 'img/add/7.png',
                description: 'фото',
                path: "",
                extension: "",
                placeHolder: 'Что на фото?',
                value: '',
                empty: true
            })
        }
    }

    let validate = (changeTab, sendData ,state) => {
        let validItem = 100;
        if (Object.keys(address).length === 0) {
            validItem = 0
        } else if (filledServices.length === 0) {
            validItem = 1
        } else if (mainInfo.length === 0 || Object.keys(occupation).length === 0) {
            validItem = 2
        }

        console.log(validItem, address, filledServices, mainInfo, occupation);

        if (validItem !== 100) {
            changeTab(validItem);
        } else {
            sendData(update, state)
        }


    }



    return (
        <StateProvider defaultState={{items: photos, error: ""}} actions={(dispatch) => ({
            deletePhoto: (evt, index, items) => {
                evt.stopPropagation();
                evt.preventDefault();
                dispatch({type: 'UPDATE_STATE_ITEM', name: "items", data: items.filter((item) => item.id !== index)});
            },
            onSortEnd: (oldIndex, newIndex, items, arrayMove) => {
                dispatch({type: 'UPDATE_STATE_ITEM', name: "items", data: arrayMove(items, oldIndex, newIndex)})
            },
            setPhotoName: (evt, index, items) => {
                let indexOfItem = items.findIndex((item) => item.id === index);
                items[indexOfItem].value = evt.target.value;
                // let index2 = items.findIndex((item) => item.id === index);
                // items[index2] = {...item};
                dispatch({type: 'UPDATE_STATE_ITEM', name: "items", data: items});
            },
            uploadPhoto : (file, items, cb, deletePhoto, setPhotoName) => {
                let data = new FormData();
                data.append('photo', file, file.name);
                let emptyIndex = items.findIndex((item) => {
                    return item.empty === true;
                });

                let addedItemIndex = emptyIndex === -1 ? items.length + 1 : emptyIndex;
                data.append('num', addedItemIndex);

                console.log(addedItemIndex);

                let param = window.location.pathname === "/add-type"  ? "" : "?id=" + window.location.pathname.split('/')[3];
                fetch( '/objects/photo' + param ,{
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: data}).then(response => response.json()).then(obj => {cb(obj, items, deletePhoto, setPhotoName)});
            },
            setImagePosition: (obj, items, deletePhoto, setPhotoName) => {
                let emptyIndex = items.findIndex((item) => {
                    return item.empty === true;
                });
                if (obj.hasOwnProperty("errors")){
                    dispatch({type: 'UPDATE_STATE_ITEM', name: "error", data: obj.errors.photo[0] === "validation.dimensions" ? "Недопустимые размеры изображения." : "Неправильный формат файла"})
                } else {

                    dispatch({type: 'UPDATE_STATE_ITEM', name: "error", data: ""});
                    if (emptyIndex !== -1) {
                        items[emptyIndex] = {...obj, deletePhoto, setPhotoName, empty: false};
                    } else {
                        items = [...items, {...obj, deletePhoto, setPhotoName, empty: false}]
                    }
                    dispatch({type: 'UPDATE_STATE_ITEM', name: "items", data: items})
                }

            },
            saveForm : (state) => {
                validate(changeTab, sendData, state)
            }
        })} reducer={(state, action) => {
            switch (action.type) {
                case 'UPDATE_INPUT':
                    return reducers.UPDATE_STATE_ITEM(action, state);
                case "UPDATE_STATE_ITEM":
                    return reducers.UPDATE_STATE_ITEM(action, state);
                case "UPDATE_NOT_EMPTY_STATE_ITEM":
                    return reducers.UPDATE_NOT_EMPTY_STATE_ITEM(action, state);
                default:
                    throw new Error();
            }
        }}>
            <PhotosTab state={globalState} />
        </StateProvider>
    )
}
