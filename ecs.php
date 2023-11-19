<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\{ArrayPushFixer, BacktickToShellExecFixer, EregToPregFixer, MbStrFunctionsFixer, NoAliasFunctionsFixer, NoAliasLanguageConstructCallFixer, NoMixedEchoPrintFixer, PowToExponentiationFixer, RandomApiMigrationFixer, SetTypeToCastFixer};
use PhpCsFixer\Fixer\ArrayNotation\{ArraySyntaxFixer, NoMultilineWhitespaceAroundDoubleArrowFixer, NoTrailingCommaInSinglelineArrayFixer, NoWhitespaceBeforeCommaInArrayFixer, NormalizeIndexBraceFixer, TrimArraySpacesFixer, WhitespaceAfterCommaInArrayFixer};
use PhpCsFixer\Fixer\Basic\{BracesFixer, EncodingFixer, NonPrintableCharacterFixer, PsrAutoloadingFixer};
use PhpCsFixer\Fixer\Casing\{ConstantCaseFixer, LowercaseKeywordsFixer, LowercaseStaticReferenceFixer, MagicConstantCasingFixer, MagicMethodCasingFixer, NativeFunctionCasingFixer, NativeFunctionTypeDeclarationCasingFixer};
use PhpCsFixer\Fixer\CastNotation\{CastSpacesFixer, LowercaseCastFixer, ModernizeTypesCastingFixer, NoShortBoolCastFixer, NoUnsetCastFixer, ShortScalarCastFixer};
use PhpCsFixer\Fixer\ClassNotation\{ClassAttributesSeparationFixer, ClassDefinitionFixer, FinalClassFixer, FinalInternalClassFixer, FinalPublicMethodForAbstractClassFixer, NoBlankLinesAfterClassOpeningFixer, NoNullPropertyInitializationFixer, NoPhp4ConstructorFixer, NoUnneededFinalMethodFixer, OrderedClassElementsFixer, OrderedInterfacesFixer, OrderedTraitsFixer, ProtectedToPrivateFixer, SelfAccessorFixer, SelfStaticAccessorFixer, SingleClassElementPerStatementFixer, VisibilityRequiredFixer};
use PhpCsFixer\Fixer\ClassUsage\DateTimeImmutableFixer;
use PhpCsFixer\Fixer\Comment\{CommentToPhpdocFixer, MultilineCommentOpeningClosingFixer, NoEmptyCommentFixer, NoTrailingWhitespaceInCommentFixer, SingleLineCommentStyleFixer};
use PhpCsFixer\Fixer\ConstantNotation\NativeConstantInvocationFixer;
use PhpCsFixer\Fixer\ControlStructure\{ElseifFixer, IncludeFixer, NoAlternativeSyntaxFixer, NoBreakCommentFixer, NoSuperfluousElseifFixer, NoTrailingCommaInListCallFixer, NoUnneededControlParenthesesFixer, NoUnneededCurlyBracesFixer, NoUselessElseFixer, SimplifiedIfReturnFixer, SwitchCaseSemicolonToColonFixer, SwitchCaseSpaceFixer, SwitchContinueToBreakFixer, TrailingCommaInMultilineFixer, YodaStyleFixer};
use PhpCsFixer\Fixer\FunctionNotation\{CombineNestedDirnameFixer, FopenFlagOrderFixer, FopenFlagsFixer, FunctionDeclarationFixer, FunctionTypehintSpaceFixer, ImplodeCallFixer, LambdaNotUsedImportFixer, MethodArgumentSpaceFixer, NativeFunctionInvocationFixer, NoUnreachableDefaultArgumentValueFixer, NoUselessSprintfFixer, NullableTypeDeclarationForDefaultNullValueFixer, RegularCallableCallFixer, ReturnTypeDeclarationFixer, SingleLineThrowFixer, UseArrowFunctionsFixer, VoidReturnFixer};
use PhpCsFixer\Fixer\Import\{FullyQualifiedStrictTypesFixer, GlobalNamespaceImportFixer, GroupImportFixer, NoLeadingImportSlashFixer, NoUnusedImportsFixer, OrderedImportsFixer, SingleLineAfterImportsFixer};
use PhpCsFixer\Fixer\LanguageConstruct\{CombineConsecutiveIssetsFixer, CombineConsecutiveUnsetsFixer, DeclareEqualNormalizeFixer, DirConstantFixer, ErrorSuppressionFixer, ExplicitIndirectVariableFixer, FunctionToConstantFixer, IsNullFixer, NoUnsetOnPropertyFixer, SingleSpaceAfterConstructFixer};
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use PhpCsFixer\Fixer\NamespaceNotation\{BlankLineAfterNamespaceFixer, CleanNamespaceFixer, NoLeadingNamespaceWhitespaceFixer, SingleBlankLineBeforeNamespaceFixer};
use PhpCsFixer\Fixer\Naming\NoHomoglyphNamesFixer;
use PhpCsFixer\Fixer\Operator\{BinaryOperatorSpacesFixer, ConcatSpaceFixer, IncrementStyleFixer, LogicalOperatorsFixer, NewWithBracesFixer, NotOperatorWithSuccessorSpaceFixer, ObjectOperatorWithoutWhitespaceFixer, OperatorLinebreakFixer, StandardizeIncrementFixer, StandardizeNotEqualsFixer, TernaryOperatorSpacesFixer, TernaryToElvisOperatorFixer, TernaryToNullCoalescingFixer, UnaryOperatorSpacesFixer};
use PhpCsFixer\Fixer\Phpdoc\{GeneralPhpdocAnnotationRemoveFixer, GeneralPhpdocTagRenameFixer, NoBlankLinesAfterPhpdocFixer, NoEmptyPhpdocFixer, NoSuperfluousPhpdocTagsFixer, PhpdocAddMissingParamAnnotationFixer, PhpdocAlignFixer, PhpdocAnnotationWithoutDotFixer, PhpdocIndentFixer, PhpdocInlineTagNormalizerFixer, PhpdocLineSpanFixer, PhpdocNoAccessFixer, PhpdocNoAliasTagFixer, PhpdocNoEmptyReturnFixer, PhpdocNoPackageFixer, PhpdocNoUselessInheritdocFixer, PhpdocOrderByValueFixer, PhpdocOrderFixer, PhpdocReturnSelfReferenceFixer, PhpdocScalarFixer, PhpdocSeparationFixer, PhpdocSingleLineVarSpacingFixer, PhpdocSummaryFixer, PhpdocTagCasingFixer, PhpdocTagTypeFixer, PhpdocToCommentFixer, PhpdocTrimConsecutiveBlankLineSeparationFixer, PhpdocTrimFixer, PhpdocTypesFixer, PhpdocTypesOrderFixer, PhpdocVarAnnotationCorrectOrderFixer, PhpdocVarWithoutNameFixer};
use PhpCsFixer\Fixer\PhpTag\{BlankLineAfterOpeningTagFixer, EchoTagSyntaxFixer, FullOpeningTagFixer, LinebreakAfterOpeningTagFixer, NoClosingTagFixer};
use PhpCsFixer\Fixer\PhpUnit\{PhpUnitConstructFixer, PhpUnitDedicateAssertFixer, PhpUnitDedicateAssertInternalTypeFixer, PhpUnitFqcnAnnotationFixer, PhpUnitInternalClassFixer, PhpUnitMethodCasingFixer, PhpUnitMockFixer, PhpUnitMockShortWillReturnFixer, PhpUnitNamespacedFixer, PhpUnitNoExpectationAnnotationFixer, PhpUnitSetUpTearDownVisibilityFixer, PhpUnitSizeClassFixer, PhpUnitStrictFixer, PhpUnitTargetVersion, PhpUnitTestAnnotationFixer, PhpUnitTestCaseStaticMethodCallsFixer, PhpUnitTestClassRequiresCoversFixer};
use PhpCsFixer\Fixer\ReturnNotation\{NoUselessReturnFixer, ReturnAssignmentFixer, SimplifiedNullReturnFixer};
use PhpCsFixer\Fixer\Semicolon\{MultilineWhitespaceBeforeSemicolonsFixer, NoEmptyStatementFixer, NoSinglelineWhitespaceBeforeSemicolonsFixer, SemicolonAfterInstructionFixer, SpaceAfterSemicolonFixer};
use PhpCsFixer\Fixer\Strict\{DeclareStrictTypesFixer, StrictComparisonFixer, StrictParamFixer};
use PhpCsFixer\Fixer\StringNotation\{EscapeImplicitBackslashesFixer, ExplicitStringVariableFixer, HeredocToNowdocFixer, NoBinaryStringFixer, NoTrailingWhitespaceInStringFixer, SimpleToComplexStringVariableFixer, SingleQuoteFixer, StringLineEndingFixer};
use PhpCsFixer\Fixer\Whitespace\{ArrayIndentationFixer, BlankLineBeforeStatementFixer, CompactNullableTypehintFixer, HeredocIndentationFixer, IndentationTypeFixer, LineEndingFixer, MethodChainingIndentationFixer, NoExtraBlankLinesFixer, NoSpacesAroundOffsetFixer, NoSpacesInsideParenthesisFixer, NoTrailingWhitespaceFixer, NoWhitespaceInBlankLineFixer, SingleBlankLineAtEofFixer};
use SlevomatCodingStandard\Sniffs\ControlStructures\RequireShortTernaryOperatorSniff;
use SlevomatCodingStandard\Sniffs\Functions\UnusedInheritedVariablePassedToClosureSniff;
use SlevomatCodingStandard\Sniffs\Operators\RequireCombinedAssignmentOperatorSniff;
use SlevomatCodingStandard\Sniffs\PHP\{DisallowDirectMagicInvokeCallSniff, UselessSemicolonSniff};
use SlevomatCodingStandard\Sniffs\Variables\UselessVariableSniff;
use Symplify\CodingStandard\Fixer\Annotation\RemovePHPStormAnnotationFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\{ArrayOpenerAndCloserNewlineFixer, StandaloneLineInMultilineArrayFixer};
use Symplify\CodingStandard\Fixer\Commenting\{ParamReturnAndVarTagMalformsFixer, RemoveUselessDefaultCommentFixer};
use Symplify\CodingStandard\Fixer\LineLength\LineLengthFixer;
use Symplify\CodingStandard\Fixer\Naming\StandardizeHereNowDocKeywordFixer;
use Symplify\CodingStandard\Fixer\Spacing\{NewlineServiceDefinitionConfigFixer, SpaceAfterCommaHereNowDocFixer, StandaloneLinePromotedPropertyFixer};
use Symplify\CodingStandard\Fixer\Strict\BlankLineAfterStrictTypesFixer;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->lineEnding("\n");
    $ecsConfig->indentation('tab');
    $parameters = $ecsConfig->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database/migrations',
        __DIR__ . '/database/seeders',
        __DIR__ . '/resources/lang',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ]);

    $services = $ecsConfig->services();
    $services

        // PhpCsFixer\Fixer\Alias
        ->set(ArrayPushFixer::class) // Converts simple usages of `array_push($x, $y);` to `$x[] = $y;`.
        ->set(BacktickToShellExecFixer::class) // Converts backtick execution operators to `shell_exec` calls.
        ->set(EregToPregFixer::class) // Replace deprecated `ereg` regular expression functions with `preg`.
        ->set(MbStrFunctionsFixer::class) // Replace non multibyte-safe functions with corresponding mb function.
        ->set(NoAliasFunctionsFixer::class) // Use master functions instead of aliases.
        ->set(NoAliasLanguageConstructCallFixer::class) // Use aster language constructs instead of aliases.
        ->set(NoMixedEchoPrintFixer::class) // Either language construct `print` or `echo` should be used, not mixed.
        ->set(PowToExponentiationFixer::class) // Converts `pow` to the `**` operator.
        ->set(RandomApiMigrationFixer::class) // Replaces `rand`, `srand`, `getrandmax` functions calls with their `mt_*` analogs.
        ->set(SetTypeToCastFixer::class) // Use cast instead of `settype`.

        // PhpCsFixer\Fixer\ArrayNotation
        ->set(ArraySyntaxFixer::class) // PHP arrays should be declared using `[]` instead of `array()`.
        ->call('configure', [[
            'syntax' => 'short',
        ]])
        ->set(NoMultilineWhitespaceAroundDoubleArrowFixer::class) // Operator `=>` should not be surrounded by multi-line whitespaces.
        ->set(NormalizeIndexBraceFixer::class) // Array index should always be written by using square braces.
        ->set(NoTrailingCommaInSinglelineArrayFixer::class) // PHP single-line arrays should not have trailing comma.
        ->set(NoWhitespaceBeforeCommaInArrayFixer::class) // In array declaration, there MUST NOT be a whitespace before each comma.
        ->set(TrimArraySpacesFixer::class) // Arrays should be formatted like function/method arguments, without leading or trailing single line space.
        ->set(WhitespaceAfterCommaInArrayFixer::class) // In array declaration, there must be a whitespace after each comma.

        // PhpCsFixer\Fixer\Basic
        ->set(BracesFixer::class) // The body of each structure MUST be enclosed by braces. Braces should be properly placed. Body of braces should be properly indented.
        ->call('configure', [[
            'allow_single_line_closure' => true,
        ]])
        ->set(EncodingFixer::class) // PHP code MUST use only UTF-8 without BOM (remove BOM).
        ->set(NonPrintableCharacterFixer::class) // Remove Zero-width space (ZWSP), Non-breaking space (NBSP) and other invisible unicode symbols.
        ->set(PsrAutoloadingFixer::class) // Classes must be in a path that matches their namespace, be at least one namespace deep and the class name should match the file name.

        // PhpCsFixer\Fixer\Casing
        ->set(ConstantCaseFixer::class) // The PHP constants `true`, `false`, and `null` must be written using the correct casing (lower).
        ->set(LowercaseKeywordsFixer::class) // PHP keywords MUST be in lower case.
        ->set(LowercaseStaticReferenceFixer::class) // Class static references `self`, `static` and `parent` MUST be in lower case.
        ->set(MagicConstantCasingFixer::class) // Magic constants should be referred to using the correct casing.
        ->set(MagicMethodCasingFixer::class) // Magic method definitions and calls must be using the correct casing.
        ->set(NativeFunctionCasingFixer::class) // Function defined by PHP should be called using the correct casing.
        ->set(NativeFunctionTypeDeclarationCasingFixer::class) // Native type hints for functions should use the correct case.

        // PhpCsFixer\Fixer\CastNotation
        ->set(CastSpacesFixer::class) // A single space or none should be between cast and variable.
        ->set(LowercaseCastFixer::class) // Casts should be written in lower case.
        ->set(ModernizeTypesCastingFixer::class) // Replace `intval`, `floatval`, `doubleval`, `strval` and `boolval` function calls with according type casting operator.
        ->set(NoShortBoolCastFixer::class) // Short cast `bool` using double exclamation mark should not be used.
        ->set(NoUnsetCastFixer::class) // Variables must be set `null` instead of using `(unset)` casting.
        ->set(ShortScalarCastFixer::class) // Cast `(boolean)` and `(integer)` should be written as `(bool)` and `(int)`, `(double)` and `(real)` as `(float)`, `(binary)` as `(string)`.

        // PhpCsFixer\Fixer\ClassNotation
        ->set(ClassAttributesSeparationFixer::class) // Class, trait and interface elements must be separated with one or none blank line.
        ->set(ClassDefinitionFixer::class) // Whitespace around the keywords of a class, trait or interfaces definition should be one space.
        ->call('configure', [[
            'single_line' => true,
        ]])
        ->set(FinalClassFixer::class) // All classes must be final, except abstract ones.
        ->set(FinalInternalClassFixer::class) // All internal classes should be `final`.
        // ->set(FinalPublicMethodForAbstractClassFixer::class) // All `public` methods of `abstract` classes should be `final`.
        ->set(NoBlankLinesAfterClassOpeningFixer::class) // There should be no empty lines after class opening brace.
        ->set(NoNullPropertyInitializationFixer::class) // Properties must not be explicitly initialized with `null` except when they have a type declaration (PHP 7.4).
        ->set(NoPhp4ConstructorFixer::class) // Convert PHP4-style constructors to `__construct`.
        ->set(NoUnneededFinalMethodFixer::class) // A `final` class must not have `final` methods and `private` methods must not be `final`.
        ->set(OrderedClassElementsFixer::class) // Orders the elements of classes/interfaces/traits.
        ->set(OrderedInterfacesFixer::class) // Orders the interfaces in an `implements` or `interface extends` clause.
        ->set(OrderedTraitsFixer::class) // Trait `use` statements must be sorted alphabetically.
        ->set(ProtectedToPrivateFixer::class) // Converts `protected` variables and methods to `private` where possible.
        ->set(SelfAccessorFixer::class) // Inside class or interface element `self` should be preferred to the class name itself.
        ->set(SelfStaticAccessorFixer::class) // Inside a `final` class or anonymous class `self` should be preferred to `static`.
        ->set(SingleClassElementPerStatementFixer::class) // There must not be more than one property or constant declared per statement.
        ->set(VisibilityRequiredFixer::class) // Visibility must be declared on all properties and methods; `abstract` and `final` must be declared before the visibility; `static` must be declared after the visibility.

        // PhpCsFixer\Fixer\ClassUsage
        ->set(DateTimeImmutableFixer::class) // Class `DateTimeImmutable` should always be used instead of `DateTime`.

        // PhpCsFixer\Fixer\Comment
        ->set(CommentToPhpdocFixer::class) // Comments with annotation should be docblock when used on structural elements.
        ->set(MultilineCommentOpeningClosingFixer::class) // DocBlocks must start with two asterisks, multiline comments must start with a single asterisk, after the opening slash. Both must end with a single asterisk before the closing slash.
        ->set(NoEmptyCommentFixer::class) // There should not be any empty comments.
        ->set(NoTrailingWhitespaceInCommentFixer::class) // There must be no trailing spaces inside comment or PHPDoc.
        ->set(SingleLineCommentStyleFixer::class) // Single-line comments and multi-line comments with only one line of actual content should use the `//` syntax.

        // PhpCsFixer\Fixer\ConstantNotation
        ->set(NativeConstantInvocationFixer::class) // Add leading `\` before constant invocation of internal constant to speed up resolving. Constant name match is case-sensitive, except for `null`, `false` and `true`.

        // PhpCsFixer\Fixer\ControlStructure
        ->set(ElseifFixer::class) // The keyword `elseif` should be used instead of `else if` so that all control keywords look like single words.
        ->set(IncludeFixer::class) // Include/Require and file path should be divided with a single space. File path should not be placed under brackets.
        ->set(NoAlternativeSyntaxFixer::class) // Replace control structure alternative syntax to use braces
        ->set(NoBreakCommentFixer::class) // There must be a comment when fall-through is intentional in a non-empty case body.
        ->set(NoSuperfluousElseifFixer::class) // Replaces superfluous `elseif` with `if`.
        ->set(NoTrailingCommaInListCallFixer::class) // Remove trailing commas in list function calls.
        ->set(NoUnneededControlParenthesesFixer::class) // Removes unneeded parentheses around control statements.
        ->set(NoUnneededCurlyBracesFixer::class) // Removes unneeded curly braces that are superfluous and aren\'t part of a control structure\'s body.
        ->call('configure', [[
            'namespaces' => true,
        ]])
        ->set(NoUselessElseFixer::class) // There should not be useless `else` cases.
        ->set(SimplifiedIfReturnFixer::class) // Simplify `if` control structures that return the boolean result of their condition.
        ->set(SwitchCaseSemicolonToColonFixer::class) // A case should be followed by a colon and not a semicolon.
        ->set(SwitchCaseSpaceFixer::class) // Removes extra spaces between colon and case value.
        ->set(SwitchContinueToBreakFixer::class) // Switch case must not be ended with `continue` but with `break`.
        ->set(TrailingCommaInMultilineFixer::class) // Multi-line arrays, arguments list and parameters list must have a trailing comma.
        ->call('configure', [[
            'elements' => [TrailingCommaInMultilineFixer::ELEMENTS_ARRAYS],
        ]])
        ->set(YodaStyleFixer::class) // Write conditions in non-Yoda style.
        ->call('configure', [[
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ]])

        // PhpCsFixer\Fixer\FunctionNotation
        ->set(CombineNestedDirnameFixer::class) // Replace multiple nested calls of `dirname` by only one call with second `$level` parameter. Requires PHP >= 7.0.
        ->set(FopenFlagOrderFixer::class) // Order the flags in `fopen` calls, `b` and `t` must be last.
        ->set(FopenFlagsFixer::class) // The flags in `fopen` calls must omit `t`, and `b` must be omitted or included consistently.
        ->set(FunctionDeclarationFixer::class) // Spaces should be properly placed in a function declaration.
        ->set(FunctionTypehintSpaceFixer::class) // Ensure single space between function\'s argument and its typehint.
        ->set(ImplodeCallFixer::class) // Function `implode` must be called with 2 arguments in the documented order.
        ->set(LambdaNotUsedImportFixer::class) // Lambda must not import variables it doesn't use.
        ->set(MethodArgumentSpaceFixer::class) // In method arguments and method call, there must not be a space before each comma and there must be one space after each comma. Argument lists may be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list must be on the next line, and there must be only one argument per line.
        ->set(NativeFunctionInvocationFixer::class) // Add leading `\` before function invocation to speed up resolving.
        ->set(NoUnreachableDefaultArgumentValueFixer::class) // In function arguments there must not be arguments with default values before non-default ones.
        ->set(NoUselessSprintfFixer::class) // There must be no `sprintf` calls with only the first argument.
        ->set(NullableTypeDeclarationForDefaultNullValueFixer::class) // Removes `?` before type declarations for parameters with a default `null` value.
        ->set(RegularCallableCallFixer::class) // Callables must be called without using `call_user_func*` when possible.
        ->set(ReturnTypeDeclarationFixer::class) // There should be one or no space before colon, and one space after it in return type declarations, according to configuration.
        ->set(SingleLineThrowFixer::class) // Throwing exception must be done in single line.
        ->set(UseArrowFunctionsFixer::class) // Anonymous functions with one-liner return statement must use arrow functions.
        ->set(VoidReturnFixer::class) // Add `void` return type to functions with missing or empty return statements, but priority is given to `@return` annotations. Requires PHP >= 7.1.

        // PhpCsFixer\Fixer\Import
        ->set(FullyQualifiedStrictTypesFixer::class) // Transforms imported FQCN parameters and return types in function arguments to short version.
        ->set(GlobalNamespaceImportFixer::class) // Imports or fully qualifies global classes/functions/constants.
        ->set(GroupImportFixer::class) // There must be groupd usage for the same namespaces.
        ->set(NoLeadingImportSlashFixer::class) // Remove leading slashes in `use` clauses.
        ->set(NoUnusedImportsFixer::class) // Unused `use` statements must be removed.
        ->set(OrderedImportsFixer::class) // Order `use` statements.
        ->set(SingleLineAfterImportsFixer::class) // Each namespace use must go on its own line and there must be one blank line after the use statements block.

        // PhpCsFixer\Fixer\LanguageConstruct
        ->set(CombineConsecutiveIssetsFixer::class) // Using `isset($var) &&` multiple times should be done in one call.
        ->set(CombineConsecutiveUnsetsFixer::class) // Calling `unset` on multiple items should be done in one call.
        ->set(DeclareEqualNormalizeFixer::class) // Equal sign in declare statement should be surrounded by spaces or not following configuration.
        ->set(DirConstantFixer::class) // Replaces `dirname(__FILE__)` expression with equivalent `__DIR__` constant.
        ->set(ErrorSuppressionFixer::class) // Error control operator should be added to deprecation notices and/or removed from other cases.
        ->set(ExplicitIndirectVariableFixer::class) // Add curly braces to indirect variables to make them clear to understand. Requires PHP >= 7.0.
        ->set(FunctionToConstantFixer::class) // Replace core functions calls returning constants with the constants.
        ->set(IsNullFixer::class) // Replaces `is_null($var)` expression with `null === $var`.
        ->set(NoUnsetOnPropertyFixer::class) // Properties should be set to `null` instead of using `unset`.
        ->set(SingleSpaceAfterConstructFixer::class) // Ensures a single space after language constructs.

        // PhpCsFixer\Fixer\ListNotation
        ->set(ListSyntaxFixer::class) // List (`array` destructuring) assignment should be declared using the configured syntax. Requires PHP >= 7.1.

        // PhpCsFixer\Fixer\NamespaceNotation
        ->set(BlankLineAfterNamespaceFixer::class) // There must be one blank line after the namespace declaration.
        ->set(CleanNamespaceFixer::class) // Namespace must not contain spacing, comments or PHPDoc.
        ->set(NoLeadingNamespaceWhitespaceFixer::class) // The namespace declaration line shouldn't contain leading whitespace.
        ->set(SingleBlankLineBeforeNamespaceFixer::class) // There should be exactly one blank line before a namespace declaration.

        // PhpCsFixer\Fixer\Naming
        ->set(NoHomoglyphNamesFixer::class) // Replace accidental usage of homoglyphs (non ascii characters) in names.

        // PhpCsFixer\Fixer\Operator
        ->set(BinaryOperatorSpacesFixer::class) // Binary operators should be surrounded by space as configured.
        ->call('configure', [[
            'operators' => [
                '|' => 'no_space',
            ],
        ]])
        ->set(ConcatSpaceFixer::class) // Concatenation should be spaced according configuration.
        ->call('configure', [[
            'spacing' => 'one',
        ]])
        ->set(IncrementStyleFixer::class) // Pre- or post-increment and decrement operators should be used if possible.
        ->set(LogicalOperatorsFixer::class) // Use `&&` and `||` logical operators instead of `and` and `or`.
        ->set(NewWithBracesFixer::class) // All instances created with new keyword must be followed by braces.
        ->set(ObjectOperatorWithoutWhitespaceFixer::class) // There should not be space before or after object operators `->` and `?->`.
        ->set(OperatorLinebreakFixer::class) // Operators - when multiline - must always be at the beginning or at the end of the line.
        ->set(StandardizeIncrementFixer::class) // Increment and decrement operators should be used if possible.
        ->set(StandardizeNotEqualsFixer::class) // Replace all `<>` with `!=`.
        ->set(TernaryOperatorSpacesFixer::class) // Standardize spaces around ternary operator.
        ->set(TernaryToElvisOperatorFixer::class) // Use the Elvis operator `?:` where possible.
        ->set(TernaryToNullCoalescingFixer::class) // Use `null` coalescing operator `??` where possible. Requires PHP >= 7.0.
        ->set(UnaryOperatorSpacesFixer::class) // Unary operators should be placed adjacent to their operands.

        // PhpCsFixer\Fixer\Phpdoc
        ->set(GeneralPhpdocAnnotationRemoveFixer::class) // Configured annotations should be omitted from PHPDoc.
        ->set(GeneralPhpdocTagRenameFixer::class) // Renames PHPDoc tags.
        ->set(NoBlankLinesAfterPhpdocFixer::class) // There should not be blank lines between docblock and the documented element.
        ->set(NoEmptyPhpdocFixer::class) // There should not be empty PHPDoc blocks.
        ->set(NoSuperfluousPhpdocTagsFixer::class) // Removes `@param`, `@return` and `@var` tags that don\'t provide any useful information.
        ->call('configure', [[
            'allow_mixed' => true,
            'allow_unused_params' => true,
        ]])
        ->set(PhpdocAddMissingParamAnnotationFixer::class) // PHPDoc should contain `@param` for all params.
        ->set(PhpdocAlignFixer::class) // All items of the given phpdoc tags must be aligned properly.
        ->call('configure', [[
            'align' => 'left',
            'tags' => ['method', 'param', 'property', 'return', 'throws', 'type', 'var'],
        ]])
        ->set(PhpdocAnnotationWithoutDotFixer::class) // PHPDoc annotation descriptions should not be a sentence.
        ->set(PhpdocIndentFixer::class) // Docblocks should have the same indentation as the documented subject.
        ->set(PhpdocInlineTagNormalizerFixer::class) // Fixes PHPDoc inline tags.
        ->set(PhpdocLineSpanFixer::class) // Changes doc blocks from single to multi line, or reversed. Works for class constants, properties and methods only.
        ->set(PhpdocNoAccessFixer::class) // `@access` annotations should be omitted from PHPDoc.
        ->set(PhpdocNoAliasTagFixer::class) // No alias PHPDoc tags should be used.
        ->set(PhpdocNoEmptyReturnFixer::class) // `@return void` and `@return null` annotations should be omitted from PHPDoc.
        ->set(PhpdocNoPackageFixer::class) // `@package` and `@subpackage` annotations should be omitted from PHPDoc.
        ->set(PhpdocNoUselessInheritdocFixer::class) // Classy that does not inherit must not have `@inheritdoc` tags.
        ->set(PhpdocOrderByValueFixer::class) // Order phpdoc tags by value.
        ->set(PhpdocOrderFixer::class) // Annotations in PHPDoc should be ordered so that `@param` annotations come first, then `@throws` annotations, then `@return` annotations.
        ->set(PhpdocReturnSelfReferenceFixer::class) // The type of `@return` annotations of methods returning a reference to itself must the configured one.
        ->set(PhpdocScalarFixer::class) // Scalar types should always be written in the same form. `int` not `integer`, `bool` not `boolean`, `float` not `real` or `double`.
        ->set(PhpdocSeparationFixer::class) // Annotations in PHPDoc should be grouped together so that annotations of the same type immediately follow each other, and annotations of a different type are separated by a single blank line.
        ->set(PhpdocSingleLineVarSpacingFixer::class) // Single line `@var` PHPDoc should have proper spacing.
        ->set(PhpdocSummaryFixer::class) // PHPDoc summary should end in either a full stop, exclamation mark, or question mark.
        ->set(PhpdocTagCasingFixer::class) // Fixes casing of PHPDoc tags.
        ->set(PhpdocTagTypeFixer::class) // Forces PHPDoc tags to be either regular annotations or inline.
        ->set(PhpdocTrimConsecutiveBlankLineSeparationFixer::class) // Removes extra blank lines after summary and after description in PHPDoc.
        ->set(PhpdocTrimFixer::class) // PHPDoc should start and end with content, excluding the very first and last line of the docblocks.
        ->set(PhpdocTypesFixer::class) // The correct case must be used for standard PHP types in PHPDoc.
        ->set(PhpdocTypesOrderFixer::class) // Sorts PHPDoc types.
        ->set(PhpdocVarAnnotationCorrectOrderFixer::class) // `@var` and `@type` annotations must have type and name in the correct order.
        ->set(PhpdocVarWithoutNameFixer::class) // `@var` and `@type` annotations of classy properties should not contain the name.

        // PhpCsFixer\Fixer\PhpTag
        ->set(BlankLineAfterOpeningTagFixer::class) // Ensure there is no code on the same line as the PHP open tag and it is followed by a blank line.
        ->set(EchoTagSyntaxFixer::class) // Replaces short-echo `<?=` with long format `<?php echo`/`<?php print` syntax, or vice-versa.
        ->set(FullOpeningTagFixer::class) // PHP code must use the long `<?php` tags or short-echo `<?=` tags and not other tag variations.
        ->set(LinebreakAfterOpeningTagFixer::class) // Ensure there is no code on the same line as the PHP open tag.
        ->set(NoClosingTagFixer::class) // The closing tag must be omitted from files containing only PHP.

        // PhpCsFixer\Fixer\PhpUnit
        ->set(PhpUnitConstructFixer::class) // PHPUnit assertion method calls like `->assertSame(true, $foo)` should be written with dedicated method like `->assertTrue($foo)`.
        ->set(PhpUnitDedicateAssertFixer::class) // PHPUnit assertions like `assertInternalType`, `assertFileExists`, should be used over `assertTrue`.
        ->set(PhpUnitDedicateAssertInternalTypeFixer::class) // PHPUnit assertions like `assertIsArray` should be used over `assertInternalType`.
        ->set(PhpUnitFqcnAnnotationFixer::class) // PHPUnit annotations should be a FQCNs including a root namespace.
        ->set(PhpUnitInternalClassFixer::class) // All PHPUnit test classes should be marked as internal.
        ->set(PhpUnitMethodCasingFixer::class) // Enforce camel (or snake) case for PHPUnit test methods, following configuration.
        ->set(PhpUnitMockFixer::class) // Usages of `->getMock` and `->getMockWithoutInvokingTheOriginalConstructor` methods MUST be replaced by `->createMock` or `->createPartialMock` methods.
        ->set(PhpUnitMockShortWillReturnFixer::class) // Usage of PHPUnit\'s mock e.g. `->will($this->returnValue(..))` must be replaced by its shorter equivalent such as `->willReturn(...)`.
        ->set(PhpUnitNamespacedFixer::class) // PHPUnit classes MUST be used in namespaced version, e.g. `\PHPUnit\Framework\TestCase` instead of `\PHPUnit_Framework_TestCase`.
        ->set(PhpUnitNoExpectationAnnotationFixer::class) // Usages of `@expectedException*` annotations MUST be replaced by `->setExpectedException*` methods.
        ->set(PhpUnitSetUpTearDownVisibilityFixer::class) // Changes the visibility of the `setUp()` and `tearDown()` functions of PHPUnit to `protected`, to match the PHPUnit TestCase.
        ->set(PhpUnitSizeClassFixer::class) // All PHPUnit test cases should have `@small`, `@medium` or `@large` annotation to enable run time limits.
        ->set(PhpUnitStrictFixer::class) // PHPUnit methods like `assertSame` should be used instead of `assertEquals`.
        ->set(PhpUnitTestAnnotationFixer::class) // Adds or removes @test annotations from tests, following configuration.
        ->set(PhpUnitTestCaseStaticMethodCallsFixer::class) // Calls to `PHPUnit\Framework\TestCase` static methods must all be of the same type, either `$this->`, `self::` or `static::`.
        ->set(PhpUnitTestClassRequiresCoversFixer::class) // Adds a default `@coversNothing` annotation to PHPUnit test classes that have no `@covers*` annotation.

        // PhpCsFixer\Fixer\ReturnNotation
        ->set(NoUselessReturnFixer::class) // There should not be an empty `return` statement at the end of a function.
        ->set(ReturnAssignmentFixer::class) // Local, dynamic and directly referenced variables should not be assigned and directly returned by a function or method.
        ->set(SimplifiedNullReturnFixer::class) // A return statement wishing to return `void` should not return `null`.

        // PhpCsFixer\Fixer\Semicolon
        ->set(MultilineWhitespaceBeforeSemicolonsFixer::class) // Forbid multi-line whitespace before the closing semicolon or move the semicolon to the new line for chained calls.
        ->set(NoEmptyStatementFixer::class) // Remove useless (semicolon) statements.
        ->set(NoSinglelineWhitespaceBeforeSemicolonsFixer::class) // Single-line whitespace before closing semicolon are prohibited.
        ->set(SemicolonAfterInstructionFixer::class) // Instructions must be terminated with a semicolon.
        ->set(SpaceAfterSemicolonFixer::class) // Fix whitespace after a semicolon.

        // PhpCsFixer\Fixer\Strict
        ->set(DeclareStrictTypesFixer::class) // Force strict types declaration in all files. Requires PHP >= 7.0.
        ->set(StrictComparisonFixer::class) // Comparisons should be strict.
        ->set(StrictParamFixer::class) // Functions should be used with `$strict` param set to `true`.

        // PhpCsFixer\Fixer\StringNotation
        ->set(EscapeImplicitBackslashesFixer::class) // Escape implicit backslashes in strings and heredocs to ease the understanding of which are special chars interpreted by PHP and which not.
        ->set(ExplicitStringVariableFixer::class) // Converts implicit variables into explicit ones in double-quoted strings or heredoc syntax.
        ->set(HeredocToNowdocFixer::class) // Convert `heredoc` to `nowdoc` where possible.
        ->set(NoBinaryStringFixer::class) // There should not be a binary flag before strings.
        ->set(NoTrailingWhitespaceInStringFixer::class) // There must be no trailing whitespace in strings.
        ->set(SimpleToComplexStringVariableFixer::class) // Converts explicit variables in double-quoted strings and heredoc syntax from simple to complex format (`${` to `{$`).
        ->set(SingleQuoteFixer::class) // 'Convert double quotes to single quotes for simple strings.
        ->set(StringLineEndingFixer::class) // All multi-line strings must use correct line ending.

        // PhpCsFixer\Fixer\Whitespace
        ->set(ArrayIndentationFixer::class) // Each element of an array must be indented exactly once.
        ->set(BlankLineBeforeStatementFixer::class) // An empty line feed must precede any configured statement.
        ->set(CompactNullableTypehintFixer::class) // Remove extra spaces in a nullable typehint.
        ->set(HeredocIndentationFixer::class) // Heredoc/nowdoc content must be properly indented. Requires PHP >= 7.3.
        ->set(IndentationTypeFixer::class) // Code must use configured indentation type.
        ->set(LineEndingFixer::class) // All PHP files must use same line ending.
        ->set(MethodChainingIndentationFixer::class) // Method chaining MUST be properly indented. Method chaining with different levels of indentation is not supported.
        ->set(NoExtraBlankLinesFixer::class) // Removes extra blank lines and/or blank lines following configuration.
        ->call('configure', [[
            'tokens' => ['curly_brace_block', 'extra', 'parenthesis_brace_block', 'square_brace_block', 'throw', 'use'],
        ]])
        ->set(NoSpacesAroundOffsetFixer::class) // There MUST NOT be spaces around offset braces.
        ->set(NoSpacesInsideParenthesisFixer::class) // There MUST NOT be a space after the opening parenthesis. There MUST NOT be a space before the closing parenthesis.
        ->set(NoTrailingWhitespaceFixer::class) // Remove trailing whitespace at the end of non-blank lines.
        ->set(NoWhitespaceInBlankLineFixer::class) // Remove trailing whitespace at the end of blank lines.
        ->set(SingleBlankLineAtEofFixer::class) // A PHP file without end tag must always end with a single empty line feed.

        // Symplify\CodingStandard\Fixer\Annotation
        ->set(RemovePHPStormAnnotationFixer::class) // Remove "Created by PhpStorm" annotations.

        // Symplify\CodingStandard\Fixer\ArrayNotation
        ->set(ArrayOpenerAndCloserNewlineFixer::class) // Indexed PHP array opener [ and closer ] must be on own line.
        ->set(StandaloneLineInMultilineArrayFixer::class) // Indexed arrays must have 1 item per line.

        // Symplify\CodingStandard\Fixer\Commenting
        ->set(ParamReturnAndVarTagMalformsFixer::class) // Fixes @param, @return, @var and inline @var annotations broken formats.
        ->set(RemoveUselessDefaultCommentFixer::class) // Remove useless PHPStorm-generated to do comments, redundant "Class XY" or "gets service" comments etc.

        // Symplify\CodingStandard\Fixer\LineLength
        ->set(LineLengthFixer::class) // Array items, method parameters, method call arguments, new arguments should be on same/standalone line to fit line length.

        // Symplify\CodingStandard\Fixer\Naming
        ->set(StandardizeHereNowDocKeywordFixer::class) // Use configured nowdoc and heredoc keyword.

        // Symplify\CodingStandard\Fixer\Spacing
        ->set(NewlineServiceDefinitionConfigFixer::class) // Add newline for a fluent call on service definition in Symfony config.
        ->set(SpaceAfterCommaHereNowDocFixer::class) // Add space after nowdoc and heredoc keyword, to prevent bugs on PHP 7.2 and lower.
        ->set(StandaloneLinePromotedPropertyFixer::class) // Promoted property should be on standalone line.

        // Symplify\CodingStandard\Fixer\Strict
        ->set(BlankLineAfterStrictTypesFixer::class) // Require strict type declarations to be followed by empty line.

        // SlevomatCodingStandard\Sniffs
        ->set(RequireShortTernaryOperatorSniff::class) // Require usage of short ternary operator.
        ->set(UnusedInheritedVariablePassedToClosureSniff::class) // Dissable unused variables to closures.
        ->set(RequireCombinedAssignmentOperatorSniff::class) // Require use of "%s" operator instead of "=" and "%s".
        ->set(DisallowDirectMagicInvokeCallSniff::class) // Disallow direct calls of __invoke().
        ->set(UselessSemicolonSniff::class) // Remove useless semicolons.
        ->set(UselessVariableSniff::class); // Remove useless variables.
};
