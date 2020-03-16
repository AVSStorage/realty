import React from 'react';
import {useDropzone} from 'react-dropzone';

export default function DropzoneWithoutKeyboard({uploadPhoto,items, deletePhoto, setPhotoName, setImagePosition, error}) {
    const {getRootProps, getInputProps, acceptedFiles} = useDropzone({noKeyboard: true, onDrop(acceptedFiles, rejectedFiles, event) {

            acceptedFiles.forEach(file => {
                uploadPhoto(file,items,setImagePosition, deletePhoto, setPhotoName)
            })

        }});
    const files = acceptedFiles.map(file => { return (<div className={"alert alert-success"} key={file.path}>Был загружен файл {file.name}</div>)});

    return (
         <div>
             <aside >
                 {error ? <div className={"alert alert-danger"}>{error}</div> : files}
             </aside>
            <div {...getRootProps({className: 'photo__item'})}>
                <div className="photo__prev">
                    <input {...getInputProps()} />
                    <img className="photo__img" src="/img/add/9.png" alt="Объект"/>
                    <div className="photo__text text-1">добавить фото</div>
                    <a href="#"><img className="photo__close" src="/img/add/8.png"
                                     alt="Закрыть"/></a>
                </div>
            </div>
         </div>
    );
}
