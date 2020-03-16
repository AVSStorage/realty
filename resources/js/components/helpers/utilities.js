function generatePaginateLinksArray(total_pages) {
    let paginateLinksArray = [];
    while (total_pages > 0){
        paginateLinksArray.push(total_pages);
        total_pages = total_pages - 1;
    }

    return paginateLinksArray.sort((a,b) => a > b);
}


export function Pagination(items, page, per_page) {
    let currentPage = page || 1;
    let pages = per_page || 6;
    let offset = (currentPage - 1) * pages;
    let paginatedItems = items.slice(offset).slice(0, pages);
    let total_pages = Math.ceil(items.length / pages);

    return {
        page: currentPage,
        per_page: pages,
        pre_page: currentPage - 1 ? currentPage - 1 : null,
        next_page: (total_pages > currentPage) ? currentPage + 1 : null,
        total: items.length,
        paginateLinksArray: generatePaginateLinksArray(total_pages),
        total_pages: total_pages,
        data: paginatedItems
    }
};


export const declOfNum = (number, titles) => {
    let cases = [2, 0, 1, 1, 1, 2];
    return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
};


export const generateDefaultState = (items, string = false, startIndex) => {

    return items.map((values, index) => {
            let map = new Map();
            values.forEach(
                val => {
                    map.set(val.id, string ? '' : 0);
                }
            )
            return {id: (startIndex ? startIndex + index : index + 1), values: map};
        }
    )


}


export const generateStateFromArray = (items, startIndex = false) => {

    return items.map((values, index) => {
            let map = new Map();
            values.length > 0 && values.forEach(
                val => {
                    map.set(val.service_id, val.value);
                }
            )
            return {id: (startIndex ? startIndex + index : index + 1), values: map};
        }
    )


}
