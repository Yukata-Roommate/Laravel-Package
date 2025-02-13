/*****************************************
 * TypeScript
 *
 * Laravel
 *****************************************/

/*----------------------------------------*
 * Laravel: Axios
 *----------------------------------------*/

import type { Axios } from "axios";
import axios from "axios";

declare global {
    interface Window {
        axios: Axios;
    }
}

window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
