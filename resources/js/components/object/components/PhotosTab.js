import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import PhotoComponent from "./PhotoComponent";
import {SortableContainer, SortableElement} from 'react-sortable-hoc';
import arrayMove from 'array-move';
import DropzoneWithoutKeyboard from './DropzoneWithoutKeyboard' ;
import {useStoreActions, useStoreContext} from "../../../store/store";


const SortableItem = SortableElement(({value}) => <PhotoComponent photo={value.value.photo}
                                                                                             description={value.value.description}
                                                                                             placeHolder={value.value.placeHolder}
                                                                                             setPhotoName={value.setPhotoName}
                                                                                             name={value.value.value}
                                                                                                      items={value.items}
                                                                                             deletePhoto={value.deletePhoto}
                                                                                             index={value.value.id}/>);

const SortableList = SortableContainer(({children}) => {
    return <div className={'photo__inner'}>{children}</div>;
});

export default function PhotosTab({state}) {


    const globalState = useStoreContext();
    let {items, error} = globalState;
    let {deletePhoto, onSortEnd, setPhotoName, uploadPhoto, setImagePosition, saveForm} = useStoreActions();


    return (
        <form onSubmit={() => saveForm(state)}>
            <div className="characteristic">
                <div className="container">
                    <div className="chara__inner">
                        <div className="chara__left">
                            <div className="chara__title" id="charaTitle">
                                Добавьте фото объекта
                            </div>

                            <div className="photo__title">
                                Фото можно менять местами и подписывать
                            </div>
                            <div className="alert alert-info">
                                Допустимые расширения файлов : png, jpeg, jpg.
                            </div>
                            <div className="alert alert-info">
                                Минимальные размеры загружаемого файла : 870x532
                            </div>
                            <div className="photo">
                                <div>
                                    <SortableList axis={'xy'}
                                                  onSortEnd={({oldIndex, newIndex}) => onSortEnd(oldIndex, newIndex, items, arrayMove)}>
                                        {items.map((value, index) => (
                                            <SortableItem key={`item-${index}`} index={index}
                                                          value={{value, deletePhoto, setPhotoName, items}}/>
                                        ))}
                                    </SortableList>

                                    <DropzoneWithoutKeyboard {...{
                                        deletePhoto,
                                        setPhotoName,
                                        setImagePosition,
                                        uploadPhoto,
                                        items,
                                        error
                                    }} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button className="chara__btn">
                Сохранить
            </button>
        </form>
    );
}
