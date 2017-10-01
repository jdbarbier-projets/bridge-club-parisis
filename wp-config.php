<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'name');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'user');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'password');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'host');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0?:A};! 7Gak@s|oc2>D]*ff1-:9h6,I$;}}e/$#()[)}ASt>X#PSN&uHLAZ*niO');
define('SECURE_AUTH_KEY',  ' dM7Y#pan5Wk7BU[-LLl0Z7@E*9d8J<I!:/3-K51sdJ.S?e*mFkY[aux$J<@,IUx');
define('LOGGED_IN_KEY',    'kf8.{;w6c[Ci{DGb1|[8/QRo)2Ega3&$/.T@>{9T[KD XMO-8i7OQ87bzD): NN ');
define('NONCE_KEY',        '_pFr4|-I<+K34B@p3s]3S_VKvfYDz-G*y9,PO{K!x1=YJibQ<iwy5I[i`-?]Jl!&');
define('AUTH_SALT',        '3U0Gp7QcET99.6g?a=;FjyUXpsK{&44YPPJo$tTO8S,?kUTZKxYPw8y$HP@ZK.`q');
define('SECURE_AUTH_SALT', 'CGHkC8Ur%eB8TeYd%W|WZ,NV%,Bu`5oOySqMCXi1H@egfuNXaq[6|0;CA7oF>ohm');
define('LOGGED_IN_SALT',   '?Q?44 !Sy(x.euN1RvLhje*nl6OcVEH;ZsLGxl?B~iA;1,fA`8:=MWVvDZnT]:7z');
define('NONCE_SALT',       '*dho){%P2.RmMS_0U9%DS7{s76.b_+v_?3%(`2 >P1g8)-oP!Wv8|^ki}Lp;#<cX');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
