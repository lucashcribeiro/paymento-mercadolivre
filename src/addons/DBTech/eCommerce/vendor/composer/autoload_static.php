<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a0b09632b6a860befc0935182d21b2b
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mikehaertl\\wkhtmlto\\' => 20,
            'mikehaertl\\tmp\\' => 15,
            'mikehaertl\\shellcommand\\' => 24,
        ),
        'M' => 
        array (
            'MaxMind\\WebService\\' => 19,
            'MaxMind\\Exception\\' => 18,
            'MaxMind\\Db\\' => 11,
            'MathParser\\' => 11,
        ),
        'I' => 
        array (
            'Ibericode\\Vat\\' => 14,
        ),
        'G' => 
        array (
            'GeoIp2\\' => 7,
        ),
        'C' => 
        array (
            'Composer\\CaBundle\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mikehaertl\\wkhtmlto\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/phpwkhtmltopdf/src',
        ),
        'mikehaertl\\tmp\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/php-tmpfile/src',
        ),
        'mikehaertl\\shellcommand\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/php-shellcommand/src',
        ),
        'MaxMind\\WebService\\' => 
        array (
            0 => __DIR__ . '/..' . '/maxmind/web-service-common/src/WebService',
        ),
        'MaxMind\\Exception\\' => 
        array (
            0 => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception',
        ),
        'MaxMind\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db',
        ),
        'MathParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser',
        ),
        'Ibericode\\Vat\\' => 
        array (
            0 => __DIR__ . '/..' . '/ibericode/vat/src',
        ),
        'GeoIp2\\' => 
        array (
            0 => __DIR__ . '/..' . '/geoip2/geoip2/src',
        ),
        'Composer\\CaBundle\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/ca-bundle/src',
        ),
    );

    public static $classMap = array (
        'Composer\\CaBundle\\CaBundle' => __DIR__ . '/..' . '/composer/ca-bundle/src/CaBundle.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'GeoIp2\\Database\\Reader' => __DIR__ . '/..' . '/geoip2/geoip2/src/Database/Reader.php',
        'GeoIp2\\Exception\\AddressNotFoundException' => __DIR__ . '/..' . '/geoip2/geoip2/src/Exception/AddressNotFoundException.php',
        'GeoIp2\\Exception\\AuthenticationException' => __DIR__ . '/..' . '/geoip2/geoip2/src/Exception/AuthenticationException.php',
        'GeoIp2\\Exception\\GeoIp2Exception' => __DIR__ . '/..' . '/geoip2/geoip2/src/Exception/GeoIp2Exception.php',
        'GeoIp2\\Exception\\HttpException' => __DIR__ . '/..' . '/geoip2/geoip2/src/Exception/HttpException.php',
        'GeoIp2\\Exception\\InvalidRequestException' => __DIR__ . '/..' . '/geoip2/geoip2/src/Exception/InvalidRequestException.php',
        'GeoIp2\\Exception\\OutOfQueriesException' => __DIR__ . '/..' . '/geoip2/geoip2/src/Exception/OutOfQueriesException.php',
        'GeoIp2\\Model\\AbstractModel' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/AbstractModel.php',
        'GeoIp2\\Model\\AnonymousIp' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/AnonymousIp.php',
        'GeoIp2\\Model\\Asn' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/Asn.php',
        'GeoIp2\\Model\\City' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/City.php',
        'GeoIp2\\Model\\ConnectionType' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/ConnectionType.php',
        'GeoIp2\\Model\\Country' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/Country.php',
        'GeoIp2\\Model\\Domain' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/Domain.php',
        'GeoIp2\\Model\\Enterprise' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/Enterprise.php',
        'GeoIp2\\Model\\Insights' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/Insights.php',
        'GeoIp2\\Model\\Isp' => __DIR__ . '/..' . '/geoip2/geoip2/src/Model/Isp.php',
        'GeoIp2\\ProviderInterface' => __DIR__ . '/..' . '/geoip2/geoip2/src/ProviderInterface.php',
        'GeoIp2\\Record\\AbstractPlaceRecord' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/AbstractPlaceRecord.php',
        'GeoIp2\\Record\\AbstractRecord' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/AbstractRecord.php',
        'GeoIp2\\Record\\City' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/City.php',
        'GeoIp2\\Record\\Continent' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/Continent.php',
        'GeoIp2\\Record\\Country' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/Country.php',
        'GeoIp2\\Record\\Location' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/Location.php',
        'GeoIp2\\Record\\MaxMind' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/MaxMind.php',
        'GeoIp2\\Record\\Postal' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/Postal.php',
        'GeoIp2\\Record\\RepresentedCountry' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/RepresentedCountry.php',
        'GeoIp2\\Record\\Subdivision' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/Subdivision.php',
        'GeoIp2\\Record\\Traits' => __DIR__ . '/..' . '/geoip2/geoip2/src/Record/Traits.php',
        'GeoIp2\\Util' => __DIR__ . '/..' . '/geoip2/geoip2/src/Util.php',
        'GeoIp2\\WebService\\Client' => __DIR__ . '/..' . '/geoip2/geoip2/src/WebService/Client.php',
        'Ibericode\\Vat\\Clients\\Client' => __DIR__ . '/..' . '/ibericode/vat/src/Clients/Client.php',
        'Ibericode\\Vat\\Clients\\ClientException' => __DIR__ . '/..' . '/ibericode/vat/src/Clients/ClientException.php',
        'Ibericode\\Vat\\Clients\\IbericodeVatRatesClient' => __DIR__ . '/..' . '/ibericode/vat/src/Clients/IbericodeVatRatesClient.php',
        'Ibericode\\Vat\\Countries' => __DIR__ . '/..' . '/ibericode/vat/src/Countries.php',
        'Ibericode\\Vat\\Exception' => __DIR__ . '/..' . '/ibericode/vat/src/Exception.php',
        'Ibericode\\Vat\\Geolocation\\IP2C' => __DIR__ . '/..' . '/ibericode/vat/src/Geolocation/IP2C.php',
        'Ibericode\\Vat\\Geolocation\\IP2Country' => __DIR__ . '/..' . '/ibericode/vat/src/Geolocation/IP2Country.php',
        'Ibericode\\Vat\\Geolocator' => __DIR__ . '/..' . '/ibericode/vat/src/Geolocator.php',
        'Ibericode\\Vat\\Period' => __DIR__ . '/..' . '/ibericode/vat/src/Period.php',
        'Ibericode\\Vat\\Rates' => __DIR__ . '/..' . '/ibericode/vat/src/Rates.php',
        'Ibericode\\Vat\\Validator' => __DIR__ . '/..' . '/ibericode/vat/src/Validator.php',
        'Ibericode\\Vat\\Vies\\Client' => __DIR__ . '/..' . '/ibericode/vat/src/Vies/Client.php',
        'Ibericode\\Vat\\Vies\\ViesException' => __DIR__ . '/..' . '/ibericode/vat/src/Vies/ViesException.php',
        'MathParser\\AbstractMathParser' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/AbstractMathParser.php',
        'MathParser\\ComplexMathParser' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/ComplexMathParser.php',
        'MathParser\\Exceptions\\DivisionByZeroException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/DivisionByZeroException.php',
        'MathParser\\Exceptions\\MathParserException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/MathParserException.php',
        'MathParser\\Exceptions\\ParenthesisMismatchException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/ParenthesisMismatchException.php',
        'MathParser\\Exceptions\\SyntaxErrorException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/SyntaxErrorException.php',
        'MathParser\\Exceptions\\UnknownConstantException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/UnknownConstantException.php',
        'MathParser\\Exceptions\\UnknownFunctionException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/UnknownFunctionException.php',
        'MathParser\\Exceptions\\UnknownOperatorException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/UnknownOperatorException.php',
        'MathParser\\Exceptions\\UnknownTokenException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/UnknownTokenException.php',
        'MathParser\\Exceptions\\UnknownVariableException' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Exceptions/UnknownVariableException.php',
        'MathParser\\Extensions\\Complex' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Extensions/Complex.php',
        'MathParser\\Extensions\\Math' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Extensions/Math.php',
        'MathParser\\Extensions\\Rational' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Extensions/Rational.php',
        'MathParser\\Interpreting\\ASCIIPrinter' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/ASCIIPrinter.php',
        'MathParser\\Interpreting\\ComplexEvaluator' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/ComplexEvaluator.php',
        'MathParser\\Interpreting\\Differentiator' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/Differentiator.php',
        'MathParser\\Interpreting\\Evaluator' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/Evaluator.php',
        'MathParser\\Interpreting\\LaTeXPrinter' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/LaTeXPrinter.php',
        'MathParser\\Interpreting\\RationalEvaluator' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/RationalEvaluator.php',
        'MathParser\\Interpreting\\TreePrinter' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/TreePrinter.php',
        'MathParser\\Interpreting\\Visitors\\Visitable' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/Visitors/Visitable.php',
        'MathParser\\Interpreting\\Visitors\\Visitor' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Interpreting/Visitors/Visitor.php',
        'MathParser\\Lexing\\ComplexLexer' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Lexing/ComplexLexer.php',
        'MathParser\\Lexing\\Lexer' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Lexing/Lexer.php',
        'MathParser\\Lexing\\StdMathLexer' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Lexing/StdMathLexer.php',
        'MathParser\\Lexing\\Token' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Lexing/Token.php',
        'MathParser\\Lexing\\TokenDefinition' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Lexing/TokenDefinition.php',
        'MathParser\\Lexing\\TokenType' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Lexing/TokenType.php',
        'MathParser\\Parsing\\Nodes\\ConstantNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/ConstantNode.php',
        'MathParser\\Parsing\\Nodes\\ExpressionNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/ExpressionNode.php',
        'MathParser\\Parsing\\Nodes\\Factories\\AdditionNodeFactory' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Factories/AdditionNodeFactory.php',
        'MathParser\\Parsing\\Nodes\\Factories\\DivisionNodeFactory' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Factories/DivisionNodeFactory.php',
        'MathParser\\Parsing\\Nodes\\Factories\\ExponentiationNodeFactory' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Factories/ExponentiationNodeFactory.php',
        'MathParser\\Parsing\\Nodes\\Factories\\MultiplicationNodeFactory' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Factories/MultiplicationNodeFactory.php',
        'MathParser\\Parsing\\Nodes\\Factories\\NodeFactory' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Factories/NodeFactory.php',
        'MathParser\\Parsing\\Nodes\\Factories\\SubtractionNodeFactory' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Factories/SubtractionNodeFactory.php',
        'MathParser\\Parsing\\Nodes\\FunctionNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/FunctionNode.php',
        'MathParser\\Parsing\\Nodes\\IntegerNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/IntegerNode.php',
        'MathParser\\Parsing\\Nodes\\Interfaces\\ExpressionNodeFactory' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Interfaces/ExpressionNodeFactory.php',
        'MathParser\\Parsing\\Nodes\\Node' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Node.php',
        'MathParser\\Parsing\\Nodes\\NumberNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/NumberNode.php',
        'MathParser\\Parsing\\Nodes\\PostfixOperatorNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/PostfixOperatorNode.php',
        'MathParser\\Parsing\\Nodes\\RationalNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/RationalNode.php',
        'MathParser\\Parsing\\Nodes\\SubExpressionNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/SubExpressionNode.php',
        'MathParser\\Parsing\\Nodes\\Traits\\Numeric' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Traits/Numeric.php',
        'MathParser\\Parsing\\Nodes\\Traits\\Sanitize' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/Traits/Sanitize.php',
        'MathParser\\Parsing\\Nodes\\VariableNode' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Nodes/VariableNode.php',
        'MathParser\\Parsing\\Parser' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Parser.php',
        'MathParser\\Parsing\\Stack' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/Parsing/Stack.php',
        'MathParser\\RationalMathParser' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/RationalMathParser.php',
        'MathParser\\StdMathParser' => __DIR__ . '/..' . '/mossadal/math-parser/src/MathParser/StdMathParser.php',
        'MaxMind\\Db\\Reader' => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db/Reader.php',
        'MaxMind\\Db\\Reader\\Decoder' => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db/Reader/Decoder.php',
        'MaxMind\\Db\\Reader\\InvalidDatabaseException' => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db/Reader/InvalidDatabaseException.php',
        'MaxMind\\Db\\Reader\\Metadata' => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db/Reader/Metadata.php',
        'MaxMind\\Db\\Reader\\Util' => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db/Reader/Util.php',
        'MaxMind\\Exception\\AuthenticationException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/AuthenticationException.php',
        'MaxMind\\Exception\\HttpException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/HttpException.php',
        'MaxMind\\Exception\\InsufficientFundsException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/InsufficientFundsException.php',
        'MaxMind\\Exception\\InvalidInputException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/InvalidInputException.php',
        'MaxMind\\Exception\\InvalidRequestException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/InvalidRequestException.php',
        'MaxMind\\Exception\\IpAddressNotFoundException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/IpAddressNotFoundException.php',
        'MaxMind\\Exception\\PermissionRequiredException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/PermissionRequiredException.php',
        'MaxMind\\Exception\\WebServiceException' => __DIR__ . '/..' . '/maxmind/web-service-common/src/Exception/WebServiceException.php',
        'MaxMind\\WebService\\Client' => __DIR__ . '/..' . '/maxmind/web-service-common/src/WebService/Client.php',
        'MaxMind\\WebService\\Http\\CurlRequest' => __DIR__ . '/..' . '/maxmind/web-service-common/src/WebService/Http/CurlRequest.php',
        'MaxMind\\WebService\\Http\\Request' => __DIR__ . '/..' . '/maxmind/web-service-common/src/WebService/Http/Request.php',
        'MaxMind\\WebService\\Http\\RequestFactory' => __DIR__ . '/..' . '/maxmind/web-service-common/src/WebService/Http/RequestFactory.php',
        'mikehaertl\\shellcommand\\Command' => __DIR__ . '/..' . '/mikehaertl/php-shellcommand/src/Command.php',
        'mikehaertl\\tmp\\File' => __DIR__ . '/..' . '/mikehaertl/php-tmpfile/src/File.php',
        'mikehaertl\\wkhtmlto\\Command' => __DIR__ . '/..' . '/mikehaertl/phpwkhtmltopdf/src/Command.php',
        'mikehaertl\\wkhtmlto\\Image' => __DIR__ . '/..' . '/mikehaertl/phpwkhtmltopdf/src/Image.php',
        'mikehaertl\\wkhtmlto\\Pdf' => __DIR__ . '/..' . '/mikehaertl/phpwkhtmltopdf/src/Pdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a0b09632b6a860befc0935182d21b2b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a0b09632b6a860befc0935182d21b2b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9a0b09632b6a860befc0935182d21b2b::$classMap;

        }, null, ClassLoader::class);
    }
}