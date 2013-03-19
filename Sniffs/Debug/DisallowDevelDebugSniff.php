<?php
class MyStandard_Sniffs_Debug_DisallowDevelDebugSniff implements PHP_CodeSniffer_Sniff {

  public function register()
  {
    return array(T_STRING, T_OPEN_PARENTHESIS);
  }

  public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if (strpos($tokens[$stackPtr]['content'], 'dpm') !== FALSE &&
            $tokens[($stackPtr + 1)]['code'] === T_OPEN_PARENTHESIS) {

            $error = "Debug code was found with the call for 'dpm()'.";
            $phpcsFile->addError($error, $stackPtr, 'Found', $data);
        }

    }

}
