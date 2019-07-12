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
define( 'DB_NAME', 'chalet-et-caviar' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'pdL#_-%i%Q  PkVra~E[y +4L/Z*jTP8g.7;fNN7 OR-gJRnjQ.[*F[H+1>jI-$z' );
define( 'SECURE_AUTH_KEY',  'kf%O}a=W8$zS%HsSc(0Q+*i=$PVwSJcWCl3/&D.>KvS{Q|i!w,LBh/<o0*{W5$zu' );
define( 'LOGGED_IN_KEY',    'c<VR91Jd^9=sAY&G[kFTVr@lA%oJrH}B>S6,-d{s[_LqY+ATP keLbcH^@.C50O9' );
define( 'NONCE_KEY',        'UPUgSr6d:#EI1/|coV$PV*p[}t_b6h6%DSXI%t[0q0_rVNx]L( oxT_K1KGn`?Vx' );
define( 'AUTH_SALT',        'H.M_|/-f[GO:&K{C3Ek)e@^W6k:C{ adxZux1p5_{1dmN/4]4]utN|*|`{2`5{,I' );
define( 'SECURE_AUTH_SALT', '^<7Id%Cfg>5T[,(ixbHzv+IL{nL+L&w6f?[ZvnfSpW;T9hIfY}<]SLt_%%MA$9^v' );
define( 'LOGGED_IN_SALT',   'eTlup}I|$^6] 7M#XrQI-(|(<mFi!DgXxiWx3z4eJ=.X{ Z@Ca|DC+`_sm:C.po$' );
define( 'NONCE_SALT',       'KZ=JhVaCJ9N#`5$6o?Ph048|jM^vdAjBY1O{WZCgdii_=8.#{>9hUVe$Z|-k|>Bv' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
