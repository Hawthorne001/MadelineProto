<?php declare(strict_types=1);
/**
 * This file is automatic generated by build_docs.php file
 * and is used only for autocomplete in multiple IDE
 * don't modify manually.
 */

namespace danog\MadelineProto\Namespace;

interface Auth
{
    /**
     * Terminates all user's authorized sessions except for the current one.
     *
     * After calling this method it is necessary to reregister the current device using the method [account.registerDevice](https://docs.madelineproto.xyz/API_docs/methods/account.registerDevice.html)
     *
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     */
    public function resetAuthorizations(?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): bool;

    /**
     * Request recovery code of a [2FA password](https://core.telegram.org/api/srp), only for accounts with a [recovery email configured](https://core.telegram.org/api/srp#email-verification).
     *
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'auth.passwordRecovery', email_pattern: string} @see https://docs.madelineproto.xyz/API_docs/types/auth.PasswordRecovery.html
     */
    public function requestPasswordRecovery(?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Reset the [2FA password](https://core.telegram.org/api/srp) using the recovery code sent using [auth.requestPasswordRecovery](https://docs.madelineproto.xyz/API_docs/methods/auth.requestPasswordRecovery.html).
     *
     * @param string $code Code received via email
     * @param array{_: 'account.passwordInputSettings', new_algo?: array{_: 'passwordKdfAlgoUnknown'}|array{_: 'passwordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow', salt1?: string, salt2?: string, g?: int, p?: string}, new_password_hash?: string, hint?: string, email?: string, new_secure_settings?: array{_: 'secureSecretSettings', secure_algo: array{_: 'securePasswordKdfAlgoUnknown'}|array{_: 'securePasswordKdfAlgoPBKDF2HMACSHA512iter100000', salt?: string}|array{_: 'securePasswordKdfAlgoSHA512', salt?: string}, secure_secret?: string, secure_secret_id?: int}} $new_settings New password @see https://docs.madelineproto.xyz/API_docs/types/account.PasswordInputSettings.html
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'auth.authorization', setup_password_required: bool, otherwise_relogin_days?: int, tmp_sessions?: int, future_auth_token?: string, user: array|int|string}|array{_: 'auth.authorizationSignUpRequired', terms_of_service?: array{_: 'help.termsOfService', id: mixed, popup: bool, text: string, entities: list<array{_: 'messageEntityUnknown', offset: int, length: int}|array{_: 'messageEntityMention', offset: int, length: int}|array{_: 'messageEntityHashtag', offset: int, length: int}|array{_: 'messageEntityBotCommand', offset: int, length: int}|array{_: 'messageEntityUrl', offset: int, length: int}|array{_: 'messageEntityEmail', offset: int, length: int}|array{_: 'messageEntityBold', offset: int, length: int}|array{_: 'messageEntityItalic', offset: int, length: int}|array{_: 'messageEntityCode', offset: int, length: int}|array{_: 'messageEntityPre', offset: int, length: int, language: string}|array{_: 'messageEntityTextUrl', offset: int, length: int, url: string}|array{_: 'messageEntityMentionName', offset: int, length: int, user_id: int}|array{_: 'inputMessageEntityMentionName', offset: int, length: int, user_id: array|int|string}|array{_: 'messageEntityPhone', offset: int, length: int}|array{_: 'messageEntityCashtag', offset: int, length: int}|array{_: 'messageEntityUnderline', offset: int, length: int}|array{_: 'messageEntityStrike', offset: int, length: int}|array{_: 'messageEntityBankCard', offset: int, length: int}|array{_: 'messageEntitySpoiler', offset: int, length: int}|array{_: 'messageEntityCustomEmoji', offset: int, length: int, document_id: int}|array{_: 'messageEntityBlockquote', collapsed: bool, offset: int, length: int}|array{_: 'messageEntityBlockquote', offset: int, length: int}>, min_age_confirm?: int}} @see https://docs.madelineproto.xyz/API_docs/types/auth.Authorization.html
     */
    public function recoverPassword(string|null $code = '', array|null $new_settings = null, ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Resend the login code via another medium, the phone code type is determined by the return value of the previous auth.sendCode/auth.resendCode: see [login](https://core.telegram.org/api/auth) for more info.
     *
     * @param string $phone_number The phone number
     * @param string $phone_code_hash The phone code hash obtained from [auth.sendCode](https://docs.madelineproto.xyz/API_docs/methods/auth.sendCode.html)
     * @param string $reason Official clients only, used if the device integrity verification failed, and no secret could be obtained to invoke [auth.requestFirebaseSms](https://docs.madelineproto.xyz/API_docs/methods/auth.requestFirebaseSms.html): in this case, the device integrity verification failure reason must be passed here.
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'auth.sentCode', type: array{_: 'auth.sentCodeTypeApp', length: int}|array{_: 'auth.sentCodeTypeSms', length: int}|array{_: 'auth.sentCodeTypeCall', length: int}|array{_: 'auth.sentCodeTypeFlashCall', pattern: string}|array{_: 'auth.sentCodeTypeMissedCall', prefix: string, length: int}|array{_: 'auth.sentCodeTypeEmailCode', apple_signin_allowed: bool, google_signin_allowed: bool, email_pattern: string, length: int, reset_available_period?: int, reset_pending_date?: int}|array{_: 'auth.sentCodeTypeSetUpEmailRequired', apple_signin_allowed: bool, google_signin_allowed: bool}|array{_: 'auth.sentCodeTypeFragmentSms', url: string, length: int}|array{_: 'auth.sentCodeTypeFirebaseSms', nonce?: string, play_integrity_project_id?: int, play_integrity_nonce?: string, receipt?: string, push_timeout?: int, length: int}|array{_: 'auth.sentCodeTypeSmsWord', beginning?: string}|array{_: 'auth.sentCodeTypeSmsPhrase', beginning?: string}, phone_code_hash: string, next_type?: array{_: 'auth.codeTypeSms'}|array{_: 'auth.codeTypeCall'}|array{_: 'auth.codeTypeFlashCall'}|array{_: 'auth.codeTypeMissedCall'}|array{_: 'auth.codeTypeFragmentSms'}, timeout?: int}|array{_: 'auth.sentCodeSuccess', authorization: array{_: 'auth.authorization', setup_password_required: bool, otherwise_relogin_days?: int, tmp_sessions?: int, future_auth_token?: string, user: array|int|string}|array{_: 'auth.authorizationSignUpRequired', terms_of_service?: array{_: 'help.termsOfService', id: mixed, popup: bool, text: string, entities: list<array{_: 'messageEntityUnknown', offset: int, length: int}|array{_: 'messageEntityMention', offset: int, length: int}|array{_: 'messageEntityHashtag', offset: int, length: int}|array{_: 'messageEntityBotCommand', offset: int, length: int}|array{_: 'messageEntityUrl', offset: int, length: int}|array{_: 'messageEntityEmail', offset: int, length: int}|array{_: 'messageEntityBold', offset: int, length: int}|array{_: 'messageEntityItalic', offset: int, length: int}|array{_: 'messageEntityCode', offset: int, length: int}|array{_: 'messageEntityPre', offset: int, length: int, language: string}|array{_: 'messageEntityTextUrl', offset: int, length: int, url: string}|array{_: 'messageEntityMentionName', offset: int, length: int, user_id: int}|array{_: 'inputMessageEntityMentionName', offset: int, length: int, user_id: array|int|string}|array{_: 'messageEntityPhone', offset: int, length: int}|array{_: 'messageEntityCashtag', offset: int, length: int}|array{_: 'messageEntityUnderline', offset: int, length: int}|array{_: 'messageEntityStrike', offset: int, length: int}|array{_: 'messageEntityBankCard', offset: int, length: int}|array{_: 'messageEntitySpoiler', offset: int, length: int}|array{_: 'messageEntityCustomEmoji', offset: int, length: int, document_id: int}|array{_: 'messageEntityBlockquote', collapsed: bool, offset: int, length: int}|array{_: 'messageEntityBlockquote', offset: int, length: int}>, min_age_confirm?: int}}} @see https://docs.madelineproto.xyz/API_docs/types/auth.SentCode.html
     */
    public function resendCode(string|null $phone_number = '', string|null $phone_code_hash = '', string|null $reason = null, ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Cancel the login verification code.
     *
     * @param string $phone_number Phone number
     * @param string $phone_code_hash Phone code hash from [auth.sendCode](https://docs.madelineproto.xyz/API_docs/methods/auth.sendCode.html)
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     */
    public function cancelCode(string|null $phone_number = '', string|null $phone_code_hash = '', ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): bool;

    /**
     * Delete all temporary authorization keys **except for** the ones specified.
     *
     * @param list<int>|array<never, never> $except_auth_keys The auth keys that **shouldn't** be dropped.
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     */
    public function dropTempAuthKeys(array $except_auth_keys = [], ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): bool;

    /**
     * Generate a login token, for [login via QR code](https://core.telegram.org/api/qr-login).
     * The generated login token should be encoded using base64url, then shown as a `tg://login?token=base64encodedtoken` [deep link »](https://core.telegram.org/api/links#qr-code-login-links) in the QR code.
     *
     * For more info, see [login via QR code](https://core.telegram.org/api/qr-login).
     *
     * @param int $api_id Application identifier (see. [App configuration](https://core.telegram.org/myapp))
     * @param string $api_hash Application identifier hash (see. [App configuration](https://core.telegram.org/myapp))
     * @param list<int>|array<never, never> $except_ids List of already logged-in user IDs, to prevent logging in twice with the same user
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'auth.loginToken', expires: int, token: string}|array{_: 'auth.loginTokenMigrateTo', dc_id: int, token: string}|array{_: 'auth.loginTokenSuccess', authorization: array{_: 'auth.authorization', setup_password_required: bool, otherwise_relogin_days?: int, tmp_sessions?: int, future_auth_token?: string, user: array|int|string}|array{_: 'auth.authorizationSignUpRequired', terms_of_service?: array{_: 'help.termsOfService', id: mixed, popup: bool, text: string, entities: list<array{_: 'messageEntityUnknown', offset: int, length: int}|array{_: 'messageEntityMention', offset: int, length: int}|array{_: 'messageEntityHashtag', offset: int, length: int}|array{_: 'messageEntityBotCommand', offset: int, length: int}|array{_: 'messageEntityUrl', offset: int, length: int}|array{_: 'messageEntityEmail', offset: int, length: int}|array{_: 'messageEntityBold', offset: int, length: int}|array{_: 'messageEntityItalic', offset: int, length: int}|array{_: 'messageEntityCode', offset: int, length: int}|array{_: 'messageEntityPre', offset: int, length: int, language: string}|array{_: 'messageEntityTextUrl', offset: int, length: int, url: string}|array{_: 'messageEntityMentionName', offset: int, length: int, user_id: int}|array{_: 'inputMessageEntityMentionName', offset: int, length: int, user_id: array|int|string}|array{_: 'messageEntityPhone', offset: int, length: int}|array{_: 'messageEntityCashtag', offset: int, length: int}|array{_: 'messageEntityUnderline', offset: int, length: int}|array{_: 'messageEntityStrike', offset: int, length: int}|array{_: 'messageEntityBankCard', offset: int, length: int}|array{_: 'messageEntitySpoiler', offset: int, length: int}|array{_: 'messageEntityCustomEmoji', offset: int, length: int, document_id: int}|array{_: 'messageEntityBlockquote', collapsed: bool, offset: int, length: int}|array{_: 'messageEntityBlockquote', offset: int, length: int}>, min_age_confirm?: int}}} @see https://docs.madelineproto.xyz/API_docs/types/auth.LoginToken.html
     */
    public function exportLoginToken(int|null $api_id = 0, string|null $api_hash = '', array $except_ids = [], ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Login using a redirected login token, generated in case of DC mismatch during [QR code login](https://core.telegram.org/api/qr-login).
     *
     * For more info, see [login via QR code](https://core.telegram.org/api/qr-login).
     *
     * @param string $token Login token
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'auth.loginToken', expires: int, token: string}|array{_: 'auth.loginTokenMigrateTo', dc_id: int, token: string}|array{_: 'auth.loginTokenSuccess', authorization: array{_: 'auth.authorization', setup_password_required: bool, otherwise_relogin_days?: int, tmp_sessions?: int, future_auth_token?: string, user: array|int|string}|array{_: 'auth.authorizationSignUpRequired', terms_of_service?: array{_: 'help.termsOfService', id: mixed, popup: bool, text: string, entities: list<array{_: 'messageEntityUnknown', offset: int, length: int}|array{_: 'messageEntityMention', offset: int, length: int}|array{_: 'messageEntityHashtag', offset: int, length: int}|array{_: 'messageEntityBotCommand', offset: int, length: int}|array{_: 'messageEntityUrl', offset: int, length: int}|array{_: 'messageEntityEmail', offset: int, length: int}|array{_: 'messageEntityBold', offset: int, length: int}|array{_: 'messageEntityItalic', offset: int, length: int}|array{_: 'messageEntityCode', offset: int, length: int}|array{_: 'messageEntityPre', offset: int, length: int, language: string}|array{_: 'messageEntityTextUrl', offset: int, length: int, url: string}|array{_: 'messageEntityMentionName', offset: int, length: int, user_id: int}|array{_: 'inputMessageEntityMentionName', offset: int, length: int, user_id: array|int|string}|array{_: 'messageEntityPhone', offset: int, length: int}|array{_: 'messageEntityCashtag', offset: int, length: int}|array{_: 'messageEntityUnderline', offset: int, length: int}|array{_: 'messageEntityStrike', offset: int, length: int}|array{_: 'messageEntityBankCard', offset: int, length: int}|array{_: 'messageEntitySpoiler', offset: int, length: int}|array{_: 'messageEntityCustomEmoji', offset: int, length: int, document_id: int}|array{_: 'messageEntityBlockquote', collapsed: bool, offset: int, length: int}|array{_: 'messageEntityBlockquote', offset: int, length: int}>, min_age_confirm?: int}}} @see https://docs.madelineproto.xyz/API_docs/types/auth.LoginToken.html
     */
    public function importLoginToken(string|null $token = '', ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Accept QR code login token, logging in the app that generated it.
     *
     * Returns info about the new session.
     *
     * For more info, see [login via QR code](https://core.telegram.org/api/qr-login).
     *
     * @param string $token Login token embedded in QR code, for more info, see [login via QR code](https://core.telegram.org/api/qr-login).
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'authorization', current: bool, official_app: bool, password_pending: bool, encrypted_requests_disabled: bool, call_requests_disabled: bool, unconfirmed: bool, hash: list<int|string>, device_model: string, platform: string, system_version: string, api_id: int, app_name: string, app_version: string, date_created: int, date_active: int, ip: string, country: string, region: string} @see https://docs.madelineproto.xyz/API_docs/types/Authorization.html
     */
    public function acceptLoginToken(string|null $token = '', ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Check if the [2FA recovery code](https://core.telegram.org/api/srp) sent using [auth.requestPasswordRecovery](https://docs.madelineproto.xyz/API_docs/methods/auth.requestPasswordRecovery.html) is valid, before passing it to [auth.recoverPassword](https://docs.madelineproto.xyz/API_docs/methods/auth.recoverPassword.html).
     *
     * @param string $code Code received via email
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     */
    public function checkRecoveryPassword(string|null $code = '', ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): bool;

    /**
     * Login by importing an authorization token.
     *
     * @param int $api_id [API ID](https://core.telegram.org/api/obtaining_api_id)
     * @param string $api_hash [API hash](https://core.telegram.org/api/obtaining_api_id)
     * @param string $web_auth_token The authorization token
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'auth.authorization', setup_password_required: bool, otherwise_relogin_days?: int, tmp_sessions?: int, future_auth_token?: string, user: array|int|string}|array{_: 'auth.authorizationSignUpRequired', terms_of_service?: array{_: 'help.termsOfService', id: mixed, popup: bool, text: string, entities: list<array{_: 'messageEntityUnknown', offset: int, length: int}|array{_: 'messageEntityMention', offset: int, length: int}|array{_: 'messageEntityHashtag', offset: int, length: int}|array{_: 'messageEntityBotCommand', offset: int, length: int}|array{_: 'messageEntityUrl', offset: int, length: int}|array{_: 'messageEntityEmail', offset: int, length: int}|array{_: 'messageEntityBold', offset: int, length: int}|array{_: 'messageEntityItalic', offset: int, length: int}|array{_: 'messageEntityCode', offset: int, length: int}|array{_: 'messageEntityPre', offset: int, length: int, language: string}|array{_: 'messageEntityTextUrl', offset: int, length: int, url: string}|array{_: 'messageEntityMentionName', offset: int, length: int, user_id: int}|array{_: 'inputMessageEntityMentionName', offset: int, length: int, user_id: array|int|string}|array{_: 'messageEntityPhone', offset: int, length: int}|array{_: 'messageEntityCashtag', offset: int, length: int}|array{_: 'messageEntityUnderline', offset: int, length: int}|array{_: 'messageEntityStrike', offset: int, length: int}|array{_: 'messageEntityBankCard', offset: int, length: int}|array{_: 'messageEntitySpoiler', offset: int, length: int}|array{_: 'messageEntityCustomEmoji', offset: int, length: int, document_id: int}|array{_: 'messageEntityBlockquote', collapsed: bool, offset: int, length: int}|array{_: 'messageEntityBlockquote', offset: int, length: int}>, min_age_confirm?: int}} @see https://docs.madelineproto.xyz/API_docs/types/auth.Authorization.html
     */
    public function importWebTokenAuthorization(int|null $api_id = 0, string|null $api_hash = '', string|null $web_auth_token = '', ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Request an SMS code via Firebase.
     *
     * @param string $phone_number Phone number
     * @param string $phone_code_hash Phone code hash returned by [auth.sendCode](https://docs.madelineproto.xyz/API_docs/methods/auth.sendCode.html)
     * @param string $safety_net_token On Android, a JWS object obtained as described in the [auth documentation »](https://core.telegram.org/api/auth)
     * @param string $play_integrity_token On Android, an object obtained as described in the [auth documentation »](https://core.telegram.org/api/auth)
     * @param string $ios_push_secret Secret token received via an apple push notification
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     */
    public function requestFirebaseSms(string|null $phone_number = '', string|null $phone_code_hash = '', string|null $safety_net_token = null, string|null $play_integrity_token = null, string|null $ios_push_secret = null, ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): bool;

    /**
     * Reset the [login email »](https://core.telegram.org/api/auth#email-verification).
     *
     * @param string $phone_number Phone number of the account
     * @param string $phone_code_hash Phone code hash, obtained as described in the [documentation »](https://core.telegram.org/api/auth)
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     * @return array{_: 'auth.sentCode', type: array{_: 'auth.sentCodeTypeApp', length: int}|array{_: 'auth.sentCodeTypeSms', length: int}|array{_: 'auth.sentCodeTypeCall', length: int}|array{_: 'auth.sentCodeTypeFlashCall', pattern: string}|array{_: 'auth.sentCodeTypeMissedCall', prefix: string, length: int}|array{_: 'auth.sentCodeTypeEmailCode', apple_signin_allowed: bool, google_signin_allowed: bool, email_pattern: string, length: int, reset_available_period?: int, reset_pending_date?: int}|array{_: 'auth.sentCodeTypeSetUpEmailRequired', apple_signin_allowed: bool, google_signin_allowed: bool}|array{_: 'auth.sentCodeTypeFragmentSms', url: string, length: int}|array{_: 'auth.sentCodeTypeFirebaseSms', nonce?: string, play_integrity_project_id?: int, play_integrity_nonce?: string, receipt?: string, push_timeout?: int, length: int}|array{_: 'auth.sentCodeTypeSmsWord', beginning?: string}|array{_: 'auth.sentCodeTypeSmsPhrase', beginning?: string}, phone_code_hash: string, next_type?: array{_: 'auth.codeTypeSms'}|array{_: 'auth.codeTypeCall'}|array{_: 'auth.codeTypeFlashCall'}|array{_: 'auth.codeTypeMissedCall'}|array{_: 'auth.codeTypeFragmentSms'}, timeout?: int}|array{_: 'auth.sentCodeSuccess', authorization: array{_: 'auth.authorization', setup_password_required: bool, otherwise_relogin_days?: int, tmp_sessions?: int, future_auth_token?: string, user: array|int|string}|array{_: 'auth.authorizationSignUpRequired', terms_of_service?: array{_: 'help.termsOfService', id: mixed, popup: bool, text: string, entities: list<array{_: 'messageEntityUnknown', offset: int, length: int}|array{_: 'messageEntityMention', offset: int, length: int}|array{_: 'messageEntityHashtag', offset: int, length: int}|array{_: 'messageEntityBotCommand', offset: int, length: int}|array{_: 'messageEntityUrl', offset: int, length: int}|array{_: 'messageEntityEmail', offset: int, length: int}|array{_: 'messageEntityBold', offset: int, length: int}|array{_: 'messageEntityItalic', offset: int, length: int}|array{_: 'messageEntityCode', offset: int, length: int}|array{_: 'messageEntityPre', offset: int, length: int, language: string}|array{_: 'messageEntityTextUrl', offset: int, length: int, url: string}|array{_: 'messageEntityMentionName', offset: int, length: int, user_id: int}|array{_: 'inputMessageEntityMentionName', offset: int, length: int, user_id: array|int|string}|array{_: 'messageEntityPhone', offset: int, length: int}|array{_: 'messageEntityCashtag', offset: int, length: int}|array{_: 'messageEntityUnderline', offset: int, length: int}|array{_: 'messageEntityStrike', offset: int, length: int}|array{_: 'messageEntityBankCard', offset: int, length: int}|array{_: 'messageEntitySpoiler', offset: int, length: int}|array{_: 'messageEntityCustomEmoji', offset: int, length: int, document_id: int}|array{_: 'messageEntityBlockquote', collapsed: bool, offset: int, length: int}|array{_: 'messageEntityBlockquote', offset: int, length: int}>, min_age_confirm?: int}}} @see https://docs.madelineproto.xyz/API_docs/types/auth.SentCode.html
     */
    public function resetLoginEmail(string|null $phone_number = '', string|null $phone_code_hash = '', ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): array;

    /**
     * Official apps only, reports that the SMS authentication code wasn't delivered.
     *
     * @param string $phone_number Phone number where we were supposed to receive the code
     * @param string $phone_code_hash The phone code hash obtained from [auth.sendCode](https://docs.madelineproto.xyz/API_docs/methods/auth.sendCode.html)
     * @param string $mnc [MNC](https://en.wikipedia.org/wiki/Mobile_country_code) of the current network operator.
     * @param ?int $floodWaitLimit Can be used to specify a custom flood wait limit: if a FLOOD_WAIT_ rate limiting error is received with a waiting period bigger than this integer, an RPCErrorException will be thrown; otherwise, MadelineProto will simply wait for the specified amount of time. Defaults to the value specified in the settings: https://docs.madelineproto.xyz/PHP/danog/MadelineProto/Settings/RPC.html#setfloodtimeout-int-floodtimeout-self
     * @param ?string $queueId If specified, ensures strict server-side execution order of concurrent calls with the same queue ID.
     * @param ?\Amp\Cancellation $cancellation Cancellation
     */
    public function reportMissingCode(string|null $phone_number = '', string|null $phone_code_hash = '', string|null $mnc = '', ?int $floodWaitLimit = null, ?string $queueId = null, ?\Amp\Cancellation $cancellation = null): bool;
}
