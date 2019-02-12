[![Build Status](https://travis-ci.org/Vinnu1/caesar-cipher-rest-api.svg?branch=master)](https://travis-ci.org/Vinnu1/caesar-cipher-rest-api)

# caesar-cipher-rest-api
Rest api (along with clientside) which caesar ciphers, converts encrypted text to hexademical and vice - versa

## Explaination  
Encryption using: CAESAR CIPHER with key 4.

Description:
Encryption process: Client sends plaintext(only alphabets) to server(backend.php), it is first encrypted by caesar cipher with key value 4.
	   Then the encrypted text is converted into hexadecimal format, converted to JSON and sent back to client. Client displays the value field of
	   JSON in encrypted textarea.

Decryption process: Client sends hexadecimal text, which is converted to string first, decrypted by caesar and sent back.
