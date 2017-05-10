import axios from 'axios';

export function get(url) {
    return axios({
        method: 'POST',
        url: url
    });
}

export function post(url, data) {
    return axios({
        method: 'POST',
        url: url,
        data: data
    });
}
