<?php

    namespace TgBotLib\Abstracts;

    abstract class PassportElementType
    {
        const PersonalDetails = 'personal_details';
        const Passport = 'passport';
        const DriverLicense = 'driver_license';
        const IdentityCard = 'identity_card';
        const InternalPassport = 'internal_passport';
        const Address = 'address';
        const UtilityBill = 'utility_bill';
        const BankStatement = 'bank_statement';
        const RentalAgreement = 'rental_agreement';
        const PassportRegistration = 'passport_registration';
        const TemporaryRegistration = 'temporary_registration';
        const PhoneNumber = 'phone_number';
        const Email = 'email';
    }