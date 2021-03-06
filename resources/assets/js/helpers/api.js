import axios from 'axios';
import auth from '../store/auth';

export function get(url) {
    return axios({
        method: 'GET',
        url: url
    });
}

export function post(url, data) {
    return axios({
        method: 'POST',
        url: url,
        data: data,
        headers: {
            'Authorization': `Bearer: ${auth.state.api_token}`
        }
    });
}
