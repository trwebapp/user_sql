<?php
/**
 * Nextcloud - user_sql
 * Copyright (C) 2018 Marcin Łojewski <dev@mlojewski.me>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace OCA\UserSQL\HashAlgorithm;

use OCA\UserSQL\HashAlgorithm\Base\BaseCrypt;
use OCA\UserSQL\HashAlgorithm\Base\Utils;

/**
 * SHA256 Crypt hashing implementation.
 * @author Marcin Łojewski <dev@mlojewski.me>
 */
class CryptSHA256 extends BaseCrypt
{
    use Utils;

    /**
     * @inheritdoc
     */
    public function getVisibleName()
    {
        return "SHA256 (Crypt)";
    }

    /**
     * @inheritdoc
     */
    protected function getSalt()
    {
        // TODO - add support for options: rounds.
        return "$5\$rounds=5000$" . self::randomString(16, self::SALT_ALPHABET) . "$";
    }
}
