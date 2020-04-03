import React from 'react';
import ReactDOM from "react-dom";
import Card from "./Card";
import CardPagination from "./CardPagination";
import Select from "@material-ui/core/Select";
import {MenuItem} from "@material-ui/core";
import {useStoreActions, useStoreContext} from "../../store/store";


export default function CardsList({region, hideOnMobile, days, error}) {


    const filters = [
        'По количеству отзывов',
        'По цене'
    ];

    const globalStore = useStoreContext();

    const {limit, sortedFilter, toggle} = globalStore;
    const {total, per_page, page, total_pages} = globalStore.filteredItems;
    const {loadMore, sortArray} = useStoreActions();


    return (
        <div className={'content__right'}>
            <div className="content__right-inner">

                <div className="content__right-title">
                    Аренда посуточно в городе {region}
                    <p>{error}</p>
                </div>

                <div className="content__right-rev">
                    <div className="left__rev">
                        <Select value={sortedFilter} onChange={(data) => sortArray(data)} labelId="label" id="select"
                                className={'range'}>
                            {
                                filters.map((item, index) => (
                                    <MenuItem value={index}>{item}</MenuItem>
                                ))
                            }
                        </Select>
                    </div>
                    <div className="right__object">Найдено объекта</div>
                </div>
                <button type="button" onClick={hideOnMobile} className="btn__choice-more d-md-none">Показать
                    фильтры
                </button>
                {toggle && (
                    <p className={"content__right-title mt-2"}>По Вашему запросу ничего не найдено.Попробуйте снова!</p>
                )}


                <Card  days={days}/>


                {
                    (total >= limit) && (
                        <div>
                            {page !== total_pages && (
                                <a href={`#${per_page / 4}`} onClick={() => loadMore()} className="btn__choice-more">
                                    Показать еще
                                </a>
                            )}
                            <CardPagination/>
                        </div>
                    )
                }


                <div className="filter__choice">
                    <img src="img/filter.png" alt="Фильтр" className="filter__img"/>
                    <button type="submit" className="btn   choice--btn  filter--btn">Недорого</button>
                    <button type="submit" className="btn   choice--btn  filter--btn">В центре</button>
                    <button type="submit" className="btn   choice--btn  filter--btn">У моря</button>
                    <button type="submit" className="btn  choice--btn  filter--btn">Рядом с пляжем
                    </button>
                    <button type="submit" className="btn    choice--btn  filter--btn">Частный сектор
                    </button>
                    <button type="submit" className="btn    choice--btn  filter--btn">Гостевые дома
                    </button>
                </div>
            </div>
        </div>
    )
}


if (document.getElementById('card')) {
    ReactDOM.render(<CardsList/>, document.getElementById('card'));
}
