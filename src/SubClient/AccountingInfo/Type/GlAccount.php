<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\AccountingInfo\Type;

class GlAccount
{
    /**
     * @var null | string
     */
    private ?string $code = null;

    /**
     * @var int
     */
    private int $type;

    /**
     * @var int
     */
    private int $subtype;

    /**
     * @var bool
     */
    private bool $isEnabled;

    /**
     * @var null | string
     */
    private ?string $descripton = null;

    /**
     * @var null | string
     */
    private ?string $descriptionNL = null;

    /**
     * @var null | string
     */
    private ?string $descriptionFR = null;

    /**
     * @var null | string
     */
    private ?string $descriptionEN = null;

    /**
     * @var bool
     */
    private bool $isVATApplicable;

    /**
     * @var float
     */
    private float $deductableVATPercentage;

    /**
     * @var float
     */
    private float $professionalPercentage;

    /**
     * @return null | string
     */
    public function getCode() : ?string
    {
        return $this->code;
    }

    /**
     * @param null | string $code
     * @return static
     */
    public function withCode(?string $code) : static
    {
        $new = clone $this;
        $new->code = $code;

        return $new;
    }

    /**
     * @return int
     */
    public function getType() : int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return static
     */
    public function withType(int $type) : static
    {
        $new = clone $this;
        $new->type = $type;

        return $new;
    }

    /**
     * @return int
     */
    public function getSubtype() : int
    {
        return $this->subtype;
    }

    /**
     * @param int $subtype
     * @return static
     */
    public function withSubtype(int $subtype) : static
    {
        $new = clone $this;
        $new->subtype = $subtype;

        return $new;
    }

    /**
     * @return bool
     */
    public function getIsEnabled() : bool
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     * @return static
     */
    public function withIsEnabled(bool $isEnabled) : static
    {
        $new = clone $this;
        $new->isEnabled = $isEnabled;

        return $new;
    }

    /**
     * @return null | string
     */
    public function getDescripton() : ?string
    {
        return $this->descripton;
    }

    /**
     * @param null | string $descripton
     * @return static
     */
    public function withDescripton(?string $descripton) : static
    {
        $new = clone $this;
        $new->descripton = $descripton;

        return $new;
    }

    /**
     * @return null | string
     */
    public function getDescriptionNL() : ?string
    {
        return $this->descriptionNL;
    }

    /**
     * @param null | string $descriptionNL
     * @return static
     */
    public function withDescriptionNL(?string $descriptionNL) : static
    {
        $new = clone $this;
        $new->descriptionNL = $descriptionNL;

        return $new;
    }

    /**
     * @return null | string
     */
    public function getDescriptionFR() : ?string
    {
        return $this->descriptionFR;
    }

    /**
     * @param null | string $descriptionFR
     * @return static
     */
    public function withDescriptionFR(?string $descriptionFR) : static
    {
        $new = clone $this;
        $new->descriptionFR = $descriptionFR;

        return $new;
    }

    /**
     * @return null | string
     */
    public function getDescriptionEN() : ?string
    {
        return $this->descriptionEN;
    }

    /**
     * @param null | string $descriptionEN
     * @return static
     */
    public function withDescriptionEN(?string $descriptionEN) : static
    {
        $new = clone $this;
        $new->descriptionEN = $descriptionEN;

        return $new;
    }

    /**
     * @return bool
     */
    public function getIsVATApplicable() : bool
    {
        return $this->isVATApplicable;
    }

    /**
     * @param bool $isVATApplicable
     * @return static
     */
    public function withIsVATApplicable(bool $isVATApplicable) : static
    {
        $new = clone $this;
        $new->isVATApplicable = $isVATApplicable;

        return $new;
    }

    /**
     * @return float
     */
    public function getDeductableVATPercentage() : float
    {
        return $this->deductableVATPercentage;
    }

    /**
     * @param float $deductableVATPercentage
     * @return static
     */
    public function withDeductableVATPercentage(float $deductableVATPercentage) : static
    {
        $new = clone $this;
        $new->deductableVATPercentage = $deductableVATPercentage;

        return $new;
    }

    /**
     * @return float
     */
    public function getProfessionalPercentage() : float
    {
        return $this->professionalPercentage;
    }

    /**
     * @param float $professionalPercentage
     * @return static
     */
    public function withProfessionalPercentage(float $professionalPercentage) : static
    {
        $new = clone $this;
        $new->professionalPercentage = $professionalPercentage;

        return $new;
    }
}

