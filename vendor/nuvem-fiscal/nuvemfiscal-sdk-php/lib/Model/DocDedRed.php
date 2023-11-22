<?php
/**
 * DocDedRed
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  NuvemFiscal
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * API Nuvem Fiscal
 *
 * API para automação comercial e documentos fiscais.
 *
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.5.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace NuvemFiscal\Model;

use \ArrayAccess;
use \NuvemFiscal\ObjectSerializer;

/**
 * DocDedRed Class Doc Comment
 *
 * @category Class
 * @description Grupo de informações de documento utilizado para Dedução/Redução do valor do serviço.
 * @package  NuvemFiscal
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DocDedRed implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DocDedRed';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'ch_nfse' => 'string',
        'ch_nfe' => 'string',
        'nfse_mun' => '\NuvemFiscal\Model\DocOutNFSe',
        'nfnfs' => '\NuvemFiscal\Model\DocNFNFS',
        'n_doc_fisc' => 'string',
        'n_doc' => 'string',
        'tp_ded_red' => 'int',
        'x_desc_out_ded' => 'string',
        'dt_emi_doc' => '\DateTime',
        'v_dedutivel_redutivel' => 'float',
        'v_deducao_reducao' => 'float',
        'fornec' => '\NuvemFiscal\Model\InfoFornecDocDedRed'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'ch_nfse' => null,
        'ch_nfe' => null,
        'nfse_mun' => null,
        'nfnfs' => null,
        'n_doc_fisc' => null,
        'n_doc' => null,
        'tp_ded_red' => null,
        'x_desc_out_ded' => null,
        'dt_emi_doc' => 'date',
        'v_dedutivel_redutivel' => null,
        'v_deducao_reducao' => null,
        'fornec' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'ch_nfse' => true,
		'ch_nfe' => true,
		'nfse_mun' => false,
		'nfnfs' => false,
		'n_doc_fisc' => true,
		'n_doc' => true,
		'tp_ded_red' => true,
		'x_desc_out_ded' => true,
		'dt_emi_doc' => true,
		'v_dedutivel_redutivel' => true,
		'v_deducao_reducao' => true,
		'fornec' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'ch_nfse' => 'chNFSe',
        'ch_nfe' => 'chNFe',
        'nfse_mun' => 'NFSeMun',
        'nfnfs' => 'NFNFS',
        'n_doc_fisc' => 'nDocFisc',
        'n_doc' => 'nDoc',
        'tp_ded_red' => 'tpDedRed',
        'x_desc_out_ded' => 'xDescOutDed',
        'dt_emi_doc' => 'dtEmiDoc',
        'v_dedutivel_redutivel' => 'vDedutivelRedutivel',
        'v_deducao_reducao' => 'vDeducaoReducao',
        'fornec' => 'fornec'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'ch_nfse' => 'setChNfse',
        'ch_nfe' => 'setChNfe',
        'nfse_mun' => 'setNfseMun',
        'nfnfs' => 'setNfnfs',
        'n_doc_fisc' => 'setNDocFisc',
        'n_doc' => 'setNDoc',
        'tp_ded_red' => 'setTpDedRed',
        'x_desc_out_ded' => 'setXDescOutDed',
        'dt_emi_doc' => 'setDtEmiDoc',
        'v_dedutivel_redutivel' => 'setVDedutivelRedutivel',
        'v_deducao_reducao' => 'setVDeducaoReducao',
        'fornec' => 'setFornec'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'ch_nfse' => 'getChNfse',
        'ch_nfe' => 'getChNfe',
        'nfse_mun' => 'getNfseMun',
        'nfnfs' => 'getNfnfs',
        'n_doc_fisc' => 'getNDocFisc',
        'n_doc' => 'getNDoc',
        'tp_ded_red' => 'getTpDedRed',
        'x_desc_out_ded' => 'getXDescOutDed',
        'dt_emi_doc' => 'getDtEmiDoc',
        'v_dedutivel_redutivel' => 'getVDedutivelRedutivel',
        'v_deducao_reducao' => 'getVDeducaoReducao',
        'fornec' => 'getFornec'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('ch_nfse', $data ?? [], null);
        $this->setIfExists('ch_nfe', $data ?? [], null);
        $this->setIfExists('nfse_mun', $data ?? [], null);
        $this->setIfExists('nfnfs', $data ?? [], null);
        $this->setIfExists('n_doc_fisc', $data ?? [], null);
        $this->setIfExists('n_doc', $data ?? [], null);
        $this->setIfExists('tp_ded_red', $data ?? [], null);
        $this->setIfExists('x_desc_out_ded', $data ?? [], null);
        $this->setIfExists('dt_emi_doc', $data ?? [], null);
        $this->setIfExists('v_dedutivel_redutivel', $data ?? [], null);
        $this->setIfExists('v_deducao_reducao', $data ?? [], null);
        $this->setIfExists('fornec', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['ch_nfse']) && (mb_strlen($this->container['ch_nfse']) > 50)) {
            $invalidProperties[] = "invalid value for 'ch_nfse', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['ch_nfe']) && (mb_strlen($this->container['ch_nfe']) > 44)) {
            $invalidProperties[] = "invalid value for 'ch_nfe', the character length must be smaller than or equal to 44.";
        }

        if (!is_null($this->container['n_doc_fisc']) && (mb_strlen($this->container['n_doc_fisc']) > 255)) {
            $invalidProperties[] = "invalid value for 'n_doc_fisc', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['n_doc_fisc']) && (mb_strlen($this->container['n_doc_fisc']) < 1)) {
            $invalidProperties[] = "invalid value for 'n_doc_fisc', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['n_doc']) && (mb_strlen($this->container['n_doc']) > 255)) {
            $invalidProperties[] = "invalid value for 'n_doc', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['n_doc']) && (mb_strlen($this->container['n_doc']) < 1)) {
            $invalidProperties[] = "invalid value for 'n_doc', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['tp_ded_red'] === null) {
            $invalidProperties[] = "'tp_ded_red' can't be null";
        }
        if (!is_null($this->container['x_desc_out_ded']) && (mb_strlen($this->container['x_desc_out_ded']) > 150)) {
            $invalidProperties[] = "invalid value for 'x_desc_out_ded', the character length must be smaller than or equal to 150.";
        }

        if (!is_null($this->container['x_desc_out_ded']) && (mb_strlen($this->container['x_desc_out_ded']) < 1)) {
            $invalidProperties[] = "invalid value for 'x_desc_out_ded', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['dt_emi_doc'] === null) {
            $invalidProperties[] = "'dt_emi_doc' can't be null";
        }
        if ($this->container['v_dedutivel_redutivel'] === null) {
            $invalidProperties[] = "'v_dedutivel_redutivel' can't be null";
        }
        if ($this->container['v_deducao_reducao'] === null) {
            $invalidProperties[] = "'v_deducao_reducao' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets ch_nfse
     *
     * @return string|null
     */
    public function getChNfse()
    {
        return $this->container['ch_nfse'];
    }

    /**
     * Sets ch_nfse
     *
     * @param string|null $ch_nfse Chave de Acesso da NFS-e (Padrão Nacional).
     *
     * @return self
     */
    public function setChNfse($ch_nfse)
    {
        if (is_null($ch_nfse)) {
            array_push($this->openAPINullablesSetToNull, 'ch_nfse');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ch_nfse', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($ch_nfse) && (mb_strlen($ch_nfse) > 50)) {
            throw new \InvalidArgumentException('invalid length for $ch_nfse when calling DocDedRed., must be smaller than or equal to 50.');
        }

        $this->container['ch_nfse'] = $ch_nfse;

        return $this;
    }

    /**
     * Gets ch_nfe
     *
     * @return string|null
     */
    public function getChNfe()
    {
        return $this->container['ch_nfe'];
    }

    /**
     * Sets ch_nfe
     *
     * @param string|null $ch_nfe Chave de Acesso da NF-e.
     *
     * @return self
     */
    public function setChNfe($ch_nfe)
    {
        if (is_null($ch_nfe)) {
            array_push($this->openAPINullablesSetToNull, 'ch_nfe');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ch_nfe', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($ch_nfe) && (mb_strlen($ch_nfe) > 44)) {
            throw new \InvalidArgumentException('invalid length for $ch_nfe when calling DocDedRed., must be smaller than or equal to 44.');
        }

        $this->container['ch_nfe'] = $ch_nfe;

        return $this;
    }

    /**
     * Gets nfse_mun
     *
     * @return \NuvemFiscal\Model\DocOutNFSe|null
     */
    public function getNfseMun()
    {
        return $this->container['nfse_mun'];
    }

    /**
     * Sets nfse_mun
     *
     * @param \NuvemFiscal\Model\DocOutNFSe|null $nfse_mun nfse_mun
     *
     * @return self
     */
    public function setNfseMun($nfse_mun)
    {
        if (is_null($nfse_mun)) {
            throw new \InvalidArgumentException('non-nullable nfse_mun cannot be null');
        }
        $this->container['nfse_mun'] = $nfse_mun;

        return $this;
    }

    /**
     * Gets nfnfs
     *
     * @return \NuvemFiscal\Model\DocNFNFS|null
     */
    public function getNfnfs()
    {
        return $this->container['nfnfs'];
    }

    /**
     * Sets nfnfs
     *
     * @param \NuvemFiscal\Model\DocNFNFS|null $nfnfs nfnfs
     *
     * @return self
     */
    public function setNfnfs($nfnfs)
    {
        if (is_null($nfnfs)) {
            throw new \InvalidArgumentException('non-nullable nfnfs cannot be null');
        }
        $this->container['nfnfs'] = $nfnfs;

        return $this;
    }

    /**
     * Gets n_doc_fisc
     *
     * @return string|null
     */
    public function getNDocFisc()
    {
        return $this->container['n_doc_fisc'];
    }

    /**
     * Sets n_doc_fisc
     *
     * @param string|null $n_doc_fisc Número de documento fiscal.
     *
     * @return self
     */
    public function setNDocFisc($n_doc_fisc)
    {
        if (is_null($n_doc_fisc)) {
            array_push($this->openAPINullablesSetToNull, 'n_doc_fisc');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('n_doc_fisc', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($n_doc_fisc) && (mb_strlen($n_doc_fisc) > 255)) {
            throw new \InvalidArgumentException('invalid length for $n_doc_fisc when calling DocDedRed., must be smaller than or equal to 255.');
        }
        if (!is_null($n_doc_fisc) && (mb_strlen($n_doc_fisc) < 1)) {
            throw new \InvalidArgumentException('invalid length for $n_doc_fisc when calling DocDedRed., must be bigger than or equal to 1.');
        }

        $this->container['n_doc_fisc'] = $n_doc_fisc;

        return $this;
    }

    /**
     * Gets n_doc
     *
     * @return string|null
     */
    public function getNDoc()
    {
        return $this->container['n_doc'];
    }

    /**
     * Sets n_doc
     *
     * @param string|null $n_doc Número de documento não fiscal.
     *
     * @return self
     */
    public function setNDoc($n_doc)
    {
        if (is_null($n_doc)) {
            array_push($this->openAPINullablesSetToNull, 'n_doc');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('n_doc', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($n_doc) && (mb_strlen($n_doc) > 255)) {
            throw new \InvalidArgumentException('invalid length for $n_doc when calling DocDedRed., must be smaller than or equal to 255.');
        }
        if (!is_null($n_doc) && (mb_strlen($n_doc) < 1)) {
            throw new \InvalidArgumentException('invalid length for $n_doc when calling DocDedRed., must be bigger than or equal to 1.');
        }

        $this->container['n_doc'] = $n_doc;

        return $this;
    }

    /**
     * Gets tp_ded_red
     *
     * @return int
     */
    public function getTpDedRed()
    {
        return $this->container['tp_ded_red'];
    }

    /**
     * Sets tp_ded_red
     *
     * @param int $tp_ded_red Identificação da Dedução/Redução:  * 1 - Alimentação e bebidas/frigobar  * 2 - Materiais  * 3 - Produção externa  * 4 - Reembolso de despesas  * 5 - Repasse consorciado  * 6 - Repasse plano de saúde  * 7 - Serviços  * 8 - Subempreitada de mão de obra  * 99 - Outras deduções
     *
     * @return self
     */
    public function setTpDedRed($tp_ded_red)
    {
        if (is_null($tp_ded_red)) {
            array_push($this->openAPINullablesSetToNull, 'tp_ded_red');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('tp_ded_red', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['tp_ded_red'] = $tp_ded_red;

        return $this;
    }

    /**
     * Gets x_desc_out_ded
     *
     * @return string|null
     */
    public function getXDescOutDed()
    {
        return $this->container['x_desc_out_ded'];
    }

    /**
     * Sets x_desc_out_ded
     *
     * @param string|null $x_desc_out_ded Descrição da Dedução/Redução quando a opção é \"99 - Outras Deduções\".
     *
     * @return self
     */
    public function setXDescOutDed($x_desc_out_ded)
    {
        if (is_null($x_desc_out_ded)) {
            array_push($this->openAPINullablesSetToNull, 'x_desc_out_ded');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('x_desc_out_ded', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($x_desc_out_ded) && (mb_strlen($x_desc_out_ded) > 150)) {
            throw new \InvalidArgumentException('invalid length for $x_desc_out_ded when calling DocDedRed., must be smaller than or equal to 150.');
        }
        if (!is_null($x_desc_out_ded) && (mb_strlen($x_desc_out_ded) < 1)) {
            throw new \InvalidArgumentException('invalid length for $x_desc_out_ded when calling DocDedRed., must be bigger than or equal to 1.');
        }

        $this->container['x_desc_out_ded'] = $x_desc_out_ded;

        return $this;
    }

    /**
     * Gets dt_emi_doc
     *
     * @return \DateTime
     */
    public function getDtEmiDoc()
    {
        return $this->container['dt_emi_doc'];
    }

    /**
     * Sets dt_emi_doc
     *
     * @param \DateTime $dt_emi_doc Data da emissão do documento dedutível. Ano, mês e dia (AAAA-MM-DD).
     *
     * @return self
     */
    public function setDtEmiDoc($dt_emi_doc)
    {
        if (is_null($dt_emi_doc)) {
            array_push($this->openAPINullablesSetToNull, 'dt_emi_doc');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('dt_emi_doc', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['dt_emi_doc'] = $dt_emi_doc;

        return $this;
    }

    /**
     * Gets v_dedutivel_redutivel
     *
     * @return float
     */
    public function getVDedutivelRedutivel()
    {
        return $this->container['v_dedutivel_redutivel'];
    }

    /**
     * Sets v_dedutivel_redutivel
     *
     * @param float $v_dedutivel_redutivel Valor monetário total dedutível/redutível no documento informado (R$).  Este é o valor total no documento informado que é passível de dedução/redução.
     *
     * @return self
     */
    public function setVDedutivelRedutivel($v_dedutivel_redutivel)
    {
        if (is_null($v_dedutivel_redutivel)) {
            array_push($this->openAPINullablesSetToNull, 'v_dedutivel_redutivel');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('v_dedutivel_redutivel', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['v_dedutivel_redutivel'] = $v_dedutivel_redutivel;

        return $this;
    }

    /**
     * Gets v_deducao_reducao
     *
     * @return float
     */
    public function getVDeducaoReducao()
    {
        return $this->container['v_deducao_reducao'];
    }

    /**
     * Sets v_deducao_reducao
     *
     * @param float $v_deducao_reducao Valor monetário utilizado para dedução/redução do valor do serviço da NFS-e que está sendo emitida (R$).  Deve ser menor ou igual ao valor deduzível/redutível (vDedutivelRedutivel).
     *
     * @return self
     */
    public function setVDeducaoReducao($v_deducao_reducao)
    {
        if (is_null($v_deducao_reducao)) {
            array_push($this->openAPINullablesSetToNull, 'v_deducao_reducao');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('v_deducao_reducao', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['v_deducao_reducao'] = $v_deducao_reducao;

        return $this;
    }

    /**
     * Gets fornec
     *
     * @return \NuvemFiscal\Model\InfoFornecDocDedRed|null
     */
    public function getFornec()
    {
        return $this->container['fornec'];
    }

    /**
     * Sets fornec
     *
     * @param \NuvemFiscal\Model\InfoFornecDocDedRed|null $fornec fornec
     *
     * @return self
     */
    public function setFornec($fornec)
    {
        if (is_null($fornec)) {
            throw new \InvalidArgumentException('non-nullable fornec cannot be null');
        }
        $this->container['fornec'] = $fornec;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

