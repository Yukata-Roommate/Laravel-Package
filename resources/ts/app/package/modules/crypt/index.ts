/*****************************************
 * Package Module Crypt
 *
 * Index
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import CryptoJS from "crypto-js";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Crypt {
    /**
     * encrypt data
     *
     * @param {string} data
     * @param {string} password
     * @param {number | undefined} iterations
     * @returns {string}
     */
    public static encrypt(
        data: string,
        password: string,
        iterations?: number
    ): string {
        return _crypt.encrypt(data, password, iterations);
    }

    /**
     * decrypt data
     *
     * @param {string} data
     * @param {string} password
     * @param {number | undefined} iterations
     * @returns {string}
     */
    public static decrypt(
        data: string,
        password: string,
        iterations?: number
    ): string {
        return _crypt.decrypt(data, password, iterations);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Crypt
 */
class _Crypt {
    /*----------------------------------------*
     * Encrypt
     *----------------------------------------*/

    /**
     * encrypt data
     *
     * @param {string} data
     * @param {string} password
     * @param {number | undefined} iterations
     * @returns {string}
     */
    public encrypt(
        data: string,
        password: string,
        iterations?: number
    ): string {
        const salt = this.salt();
        const iv = this.iv();
        const key = this.key(password, salt, iterations);

        const encrypted = CryptoJS.AES.encrypt(data, key, {
            iv: iv,
            padding: CryptoJS.pad.Pkcs7,
            mode: CryptoJS.mode.CBC,
        }).toString();

        return btoa(salt.toString() + iv.toString() + encrypted);
    }

    /*----------------------------------------*
     * Decrypt
     *----------------------------------------*/

    /**
     * decrypt data
     *
     * @param {string} data
     * @param {string} password
     * @param {number | undefined} iterations
     * @returns {string}
     */
    public decrypt(
        data: string,
        password: string,
        iterations?: number
    ): string {
        data = atob(data);

        const saltLength = this.saltLength() * 2;
        const salt = CryptoJS.enc.Hex.parse(data.substring(0, saltLength));

        const ivLength = this.ivLength() * 2;
        const iv = CryptoJS.enc.Hex.parse(
            data.substring(saltLength, saltLength + ivLength)
        );

        data = data.substring(saltLength + ivLength);

        const key = this.key(password, salt, iterations);

        return CryptoJS.AES.decrypt(data, key, {
            iv: iv,
            padding: CryptoJS.pad.Pkcs7,
            mode: CryptoJS.mode.CBC,
        }).toString(CryptoJS.enc.Utf8);
    }

    /*----------------------------------------*
     * Salt
     *----------------------------------------*/

    /**
     * get salt
     *
     * @returns {CryptoJS.lib.WordArray}
     */
    protected salt(): CryptoJS.lib.WordArray {
        return CryptoJS.lib.WordArray.random(this.saltLength());
    }

    /**
     * get salt length
     *
     * @returns {number}
     */
    protected saltLength(): number {
        return 128 / 8;
    }

    /*----------------------------------------*
     * Initialization Vector
     *----------------------------------------*/

    /**
     * get initialization vector
     *
     * @returns {CryptoJS.lib.WordArray}
     */
    protected iv(): CryptoJS.lib.WordArray {
        return CryptoJS.lib.WordArray.random(this.ivLength());
    }

    /**
     * get initialization vector length
     *
     * @returns {number}
     */
    protected ivLength(): number {
        return 128 / 8;
    }

    /*----------------------------------------*
     * Key
     *----------------------------------------*/

    /**
     * get key
     *
     * @param {string} password
     * @param {CryptoJS.lib.WordArray} salt
     * @param {number | undefined} iterations
     * @returns {CryptoJS.lib.WordArray}
     */
    protected key(
        password: string,
        salt: CryptoJS.lib.WordArray,
        iterations?: number
    ): CryptoJS.lib.WordArray {
        return CryptoJS.PBKDF2(password, salt, {
            keySize: this.keyLength(),
            iterations: iterations || 10000,
            hasher: CryptoJS.algo.SHA512,
        });
    }

    /**
     * get key length
     *
     * @returns {number}
     */
    protected keyLength(): number {
        return 256 / 32;
    }
}

/**
 * Crypt
 *
 * @type {_Crypt}
 */
const _crypt: _Crypt = new _Crypt();
